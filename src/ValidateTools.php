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
            $rule_config = $r->getConfig();
            $rule_error = $rule_config['error'];

            if (isset($args[$key])) {
                try {
                    $r->validate($args[$key]);
                } catch (ValidateException $e) {
                    if (!$rule_error) {
                        throw new ValidateArgumentException(sprintf("Invalid arguments `%s`", $key), -1, $key, $e);
                    }

                    throw $rule_error;
                }

                $result[] = $args[$key];
                continue;
            }

            if (!$rule_config['require']) {
                $result[] = null;
                continue;
            }

            if (!$rule_error) {
                throw new ValidateArgumentException(sprintf("Arguments `%s` missing", $key), -1, $key);
            }

            throw $rule_error;
        }

        return $result;
    }
}