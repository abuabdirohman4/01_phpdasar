<?php
// Date = Untuk menampilkan tanggal dengan format tertentu
// Dokumentasi Lengkap lihat di web
echo date("l, d-M-Y");
echo date("m");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 januari 1970
echo time();
echo date("d M Y", time() - 60 * 60 * 24 * 100);

// mktime
// membuat sendiri detiknya
mktime(0,0,0,0,0,0);
// jam, menit, detik, bulan, tanggal, tahun
echo date("l", mktime(0, 0, 0, 6, 17, 1997));

// date in mm/dd/yyyy format; or it can be in other formats as well
$birthDate = "12/17/1983";
//explode the date to get month, day and year
$birthDate = explode("/", $birthDate);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
echo "Age is:" . $age;

$bday = new DateTime('17.6.1997'); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
printf("\n");
