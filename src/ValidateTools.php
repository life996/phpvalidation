<?php

namespace Life96\PhpValidation;

class ValidateTools
{
    /**
     * 验证一组数据
     * @param $args array
     * @param $rules array<string, Validate>
     * @return array
     * @throws ValidateArgumentException
     * @example
     * ```code
     * $_GET = [
     *      'name' => 'life',
     *      'age' => 66,
     * ];
     *
     * $rules = [
     *      'name' => vas::regex('/^\w{1,10}$/'),
     *      'age' => vas::number()->isInt()->between(12, 120),
     * ];
     *
     * try {
     *
     *      list($name) = vat::verifyParams($_GET, $rules);
     *
     * } catch (ValidateArgumentException $e) {
     *      printf("require: %s\n", $e->getArgument());
     * } catch (ValidateException $e) {
     *      printf("validator: %s, msg: %s\n", $e->getValidator()->name, $e->getMessage());
     * }
     * ```
     */
    static public function verifyParams(array $args, array $rules): array
    {
        $result = [];

        foreach ($rules as $key => $r) {
            if (isset($args[$key])) {
                $r->validate($args[$key]);
                $result[] = $args[$key];
                continue;
            }

            if(!$r->getRequire()){
                $result[] = null;
                continue;
            }

            throw new ValidateArgumentException(sprintf("Argument `%s` missing", $key), $key);
        }

        return $result;
    }
}