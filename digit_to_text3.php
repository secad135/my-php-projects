<?php
function convertNumberToWords($number) {
    $words = [
        0 => 'صفر',
        1 => 'یک',
        2 => 'دو',
        3 => 'سه',
        4 => 'چهار',
        5 => 'پنج',
        6 => 'شش',
        7 => 'هفت',
        8 => 'هشت',
        9 => 'نه',
        10 => 'ده',
        11 => 'یازده',
        12 => 'دوازده',
        13 => 'سیزده',
        14 => 'چهارده',
        15 => 'پانزده',
        16 => 'شانزده',
        17 => 'هفده',
        18 => 'هجده',
        19 => 'نوزده',
        20 => 'بیست',
        30 => 'سی',
        40 => 'چهل',
        50 => 'پنجاه',
        60 => 'شصت',
        70 => 'هفتاد',
        80 => 'هشتاد',
        90 => 'نود',
        100 => 'صد',
        200 => 'دویست',
        300 => 'سیصد',
        400 => 'چهارصد',
        500 => 'پانصد',
        600 => 'ششصد',
        700 => 'هفتصد',
        800 => 'هشتصد',
        900 => 'نهصد',
        1000 => 'هزار',
        1000000 => 'میلیون',
        1000000000 => 'میلیارد'
    ];

    if ($number < 0) {
        return 'منفی ' . convertNumberToWords(-$number);
    }

    if ($number < 20) {
        return $words[$number];
    }

    if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        return $words[$tens] . ($units ? ' و ' . $words[$units] : '');
    }

    if ($number < 1000) {
        $hundreds = floor($number / 100) * 100;
        $remainder = $number % 100;
        return $words[$hundreds] . ($remainder ? ' و ' . convertNumberToWords($remainder) : '');
    }

    if ($number < 1000000) {
        $thousands = floor($number / 1000);
        $remainder = $number % 1000;
        return convertNumberToWords($thousands) . ' هزار' . ($remainder ? ' و ' . convertNumberToWords($remainder) : '');
    }

    if ($number < 1000000000) {
        $millions = floor($number / 1000000);
        $remainder = $number % 1000000;
        return convertNumberToWords($millions) . ' میلیون' . ($remainder ? ' و ' . convertNumberToWords($remainder) : '');
    }

    if ($number < 1000000000000) {
        $billions = floor($number / 1000000000);
        $remainder = $number % 1000000000;
        return convertNumberToWords($billions) . ' میلیارد' . ($remainder ? ' و ' . convertNumberToWords($remainder) : '');
    }

    return 'عدد بزرگتر از ۱۰۰۰ میلیارد است';
}

// دریافت عدد از ورودی
if (isset($_POST['number'])) {
    $number = intval($_POST['number']);
    if (isset($number)) {
        $result = convertNumberToWords($number);
    } 
} else {
    $result = '';
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
        body {
            text-align: center;
            font-family: Rubik;
            background-color: #f4f4f4;
            padding: 20px;
        }
        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 10px;
            font-size: 16px;
        }
        h1 {
            color: #35424a;
        }
        h2 {
            color: #e8491d;
        }
        footer{
            position: fixed;
            bottom: 0px;
            left: 40%;
        }
        
    </style>
    <meta charset="UTF-8">
    <title>تبدیل عدد به حروف</title>
</head>
<body>
    <h1>تبدیل عدد به حروف فارسی</h1>
    
    <form method="post">
        <label for="number">عدد را وارد کنید:</label>
        <input type="number" name="number" id="number" required>
        <input type="submit" value="تبدیل">
    </form>
    <?php if ($result): ?>
        <h2>عدد وارد شده: <?php echo htmlspecialchars($number); ?></h2>
        <h2>نتیجه: <?php echo $result; ?></h2>
    <?php endif; ?>
    <footer>
        <p>1403/08/03 سجاد اسماعیلی <a target="_blank" href="https://secad.ir">SECAD.ir</a></p>
        
    </footer>
</body>
</html>