<?php

function rus2translit($string) {

    $converter = array(

        'а' => 'a',   'б' => 'b',   'в' => 'v',

        'г' => 'g',   'д' => 'd',   'е' => 'e',

        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

        'и' => 'i',   'й' => 'y',   'к' => 'k',

        'л' => 'l',   'м' => 'm',   'н' => 'n',

        'о' => 'o',   'п' => 'p',   'р' => 'r',

        'с' => 's',   'т' => 't',   'у' => 'u',

        'ф' => 'f',   'х' => 'h',   'ц' => 'c',

        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',



        'А' => 'A',   'Б' => 'B',   'В' => 'V',

        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

        'И' => 'I',   'Й' => 'Y',   'К' => 'K',

        'Л' => 'L',   'М' => 'M',   'Н' => 'N',

        'О' => 'O',   'П' => 'P',   'Р' => 'R',

        'С' => 'S',   'Т' => 'T',   'У' => 'U',

        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

    );

    return strtr($string, $converter);

}

function str2url($str) {

    // переводим в транслит

    $str = rus2translit($str);

    // в нижний регистр

    $str = strtolower($str);

    // заменям все ненужное нам на "-"

    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);

    // удаляем начальные и конечные '-'

    $str = trim($str, "-");

    return $str;

}

$uploadDir = "images/work/";
$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
$file_size = 2097152; // 2МБ
$file = $_FILES['userfile'];
$data = array();

if($file['size'] > $file_size){
    $data['message'] = "Файл слишком большой. Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    $data['url'] = '';
} else if(!in_array($file['type'], $types)){
    $data['message'] = "Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    $data['url'] = '';
} else if($file['error'] == 0){
    $filename = basename($file['name']);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if(move_uploaded_file($file['tmp_name'], $uploadDir.str2url($filename).'.'.$extension)){
        $data['message'] = "ОК";
        $data['url'] = $uploadDir.str2url($filename).'.'.$extension;
        $data['name'] = $filename;
    } else {
        $data['message'] = "Возникла неизвестная ошибка при загрузке файла";
        $data['url'] = '';
    }
}

echo json_encode($data);

