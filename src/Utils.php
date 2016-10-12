<?php

namespace Cybtow\Utils;

/**
 * Utils class
 *
 * @author cybtow
 */
class Utils {

    /**
     * slug: Create a valid string for urls
     * 
     * @param string $str
     * @param array $replace
     * @param string $delimiter
     * @return string
     */
    public function slug($str, array $replace = array(), $delimiter = '-') {
        setlocale(LC_ALL, 'en_US.UTF8');
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', $str);
        }

        $ciric = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ы', 'Ъ', 'Э', 'Ю', 'Я');
        $ciric2latin = array('A', 'B', 'V', 'G', 'D', 'YE', 'J', 'Z', 'I', 'LL', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'TZ', 'CH', 'SH', 'SH', '', '', '', 'E', 'LLU', 'LLA');
        $str = str_replace((array) $ciric, (array) $ciric2latin, $str);

        $ciric = array('а', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ы', 'ъ', 'э', 'ю', 'я');
        $ciric2latin = array('a', 'b', 'v', 'g', 'd', 'ye', 'j', 'z', 'i', 'll', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'tz', 'ch', 'sh', 'sh', '', '', '', 'e', 'llu', 'lla');
        $str = str_replace((array) $ciric, (array) $ciric2latin, $str);

        $clean = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

    /**
     * getUniqId: Return a unique random id
     * 
     * @return string
     */
    public function getUniqId() {
        return (md5(uniqid(rand(), true)));
    }

    /**
     * echoVarDump: Prints a var dump and exists (optionaly)
     * 
     * @param mixed $data
     * @param bool $exit
     */
    public function echoVarDump($data, $exit = true) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        if ($exit) {
            exit();
        }
    }

}
