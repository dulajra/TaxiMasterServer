<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\User(['username'=>'admin', 'password'=>\Illuminate\Support\Facades\Hash::make('admin1234'), 'firstName'=>'Dulaj', 'lastName'=>'Atapattu', 'phone'=>'0777146646', 'userLevelId'=>1, 'isActive'=>true, 'image' => 'https://lh4.googleusercontent.com/TeENL3SWisDCxEx6XpI7fveVjE34uiSdUbV6QYBzkIP_jMaDQDGFLheJftQgd9pYFwT0S-K5YY69Xwo=w1366-h630-rw']))->save();

        (new \App\User(['username'=>'anuradha', 'password'=>\Illuminate\Support\Facades\Hash::make('anuradha1234'), 'firstName'=>'Anuradha', 'lastName'=>'Wickramrachchi', 'phone'=>'0715944191', 'userLevelId'=>2, 'isActive'=>true, 'image' => 'https://lh4.googleusercontent.com/yxvAI-uF_rlghKrmfwYk17pKti09-w0AaEz-wUOoAxbIiadv-PBUjmp-EJG4p6XZnO9kLZJgvPw9XSA=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'ravidu', 'password'=>\Illuminate\Support\Facades\Hash::make('ravidu1234'), 'firstName'=>'Ravidu', 'lastName'=>'Lashan', 'phone'=>'0712481879', 'userLevelId'=>2, 'isActive'=>true, 'image' => 'https://lh6.googleusercontent.com/U4bHdbPqj9DSaIlT3rJnhzJ6oxAqRr8Hl3gyRf_vwBOtike-bObtnoGeAIYdYnkru_OfSW25UIZ3mNI=w1366-h630']))->save();
        (new \App\User(['username'=>'jayan', 'password'=>\Illuminate\Support\Facades\Hash::make('jayan1234'), 'firstName'=>'Jayan', 'lastName'=>'Vidanapathirana', 'phone'=>'0715594516', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh5.googleusercontent.com/zY8KZlD6TVauP0jtNYWyWW0meWgIQwAtzPvPf_WZLhy_aMzXTJkrL7kbHHlhVkAPe1VPm1ceWu7Sv9E=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'eranga', 'password'=>\Illuminate\Support\Facades\Hash::make('eranga1234'), 'firstName'=>'Eranga', 'lastName'=>'Heshan', 'phone'=>'0715521984', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh6.googleusercontent.com/lu9p4vBHuhwe1Hsn3m_32TkP_hthFqKR4OVItkpWNgGk88R9kjLDK66H8BnSpHVUL8_G-2029yenRCg=w1366-h630']))->save();
        (new \App\User(['username'=>'roshan', 'password'=>\Illuminate\Support\Facades\Hash::make('roshan1234'), 'firstName'=>'Roshan', 'lastName'=>'Madusanka', 'phone'=>'0715894672', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh6.googleusercontent.com/dcwr4QzHlrTe7ZIyCZp01srQ5_ko-ApDsWuT3h4peWDFcJlr4t1d3NnD38rgaiAg4MfNPaFj-IcM7Fk=w1366-h630']))->save();
        (new \App\User(['username'=>'imesha', 'password'=>\Illuminate\Support\Facades\Hash::make('imesha1234'), 'firstName'=>'Imesha', 'lastName'=>'Sudasinghe', 'phone'=>'0717086160', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh3.googleusercontent.com/-z217cRNsxj4OlBEL-bgkymaRxloC646MIqDH6p7JfOD4kueRRcoSyYNAoSLxxRuvYRFU4g-XKRjKZM=w1366-h630']))->save();
        (new \App\User(['username'=>'pasindu', 'password'=>\Illuminate\Support\Facades\Hash::make('pasindu1234'), 'firstName'=>'Pasindu', 'lastName'=>'Kanchana', 'phone'=>'0718739878', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh5.googleusercontent.com/XavEyNwpfuo-iXf90mzq2YaAPd0s1ptsQtFtwEgBCPiDQGh0mO2dvkmM3_6AMbpRMHMHCfEtcioEUFw=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'kanchana', 'password'=>\Illuminate\Support\Facades\Hash::make('kanchana1234'), 'firstName'=>'Kanchana', 'lastName'=>'Ruwanpathirana', 'phone'=>'0714300800', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh5.googleusercontent.com/qg9Jv1VOmOo80-PBysfWKPagxNZaFOik9hx28Txwmoe-7aV63KM6e12BEPh8MMzwKET1qf1Sxov2i24=w1366-h630']))->save();
        (new \App\User(['username'=>'melanka', 'password'=>\Illuminate\Support\Facades\Hash::make('melanka1234'), 'firstName'=>'Melanka', 'lastName'=>'Sarod', 'phone'=>'0716984563', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh6.googleusercontent.com/JAsfTRH0S8qGKJ9xanQ_bbNOi5t5SjP1s7xGl1bzUsSXs5FMnjmC1RC0exp6FajXpncTFQsKDgM26Oo=w1366-h630']))->save();
        (new \App\User(['username'=>'keet', 'password'=>\Illuminate\Support\Facades\Hash::make('keet1234'), 'firstName'=>'Keet', 'lastName'=>'Sugathadasa', 'phone'=>'0778435878', 'userLevelId'=>2, 'isActive'=>true, 'image'=>'https://lh6.googleusercontent.com/S7NNB5OHLPcFsNgAb1Y8HiDYBouL3VmyO_CdFbtu6_4kfUYclyQBA67wVv5LsFx-RUMDqKJff4vtAl8=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'danuja', 'password'=>\Illuminate\Support\Facades\Hash::make('danuja1234'), 'firstName'=>'Danuja', 'lastName'=>'Jayawadena', 'phone'=>'0728333878', 'userLevelId'=>2, 'isActive'=>true, 'image'=>'https://lh4.googleusercontent.com/pT6S3HnG2Ps3A08RRpXu1D1auAIDNbLtE-SGq46OOif-69L6HJmjkgDq6wixgizIcEuidanpc3pgPG8=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'sineth', 'password'=>\Illuminate\Support\Facades\Hash::make('sineth1234'), 'firstName'=>'Sineth', 'lastName'=>'Neranjana', 'phone'=>'0785739818', 'userLevelId'=>2, 'isActive'=>true,'image'=>'https://lh4.googleusercontent.com/9Xj9DMiWVug0H2dib3LiDFL5FZMeg2vcj7XphKOQLXt6SEdTb9MIs12u91CtHsYct_ZeZr4lOeQBog0=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'nadun', 'password'=>\Illuminate\Support\Facades\Hash::make('nadun1234'), 'firstName'=>'Nadun', 'lastName'=>'Indunil', 'phone'=>'0718754178', 'userLevelId'=>2, 'isActive'=>true, 'image' => 'https://lh6.googleusercontent.com/pQrZiHo1icPbtszQzjKr7vEhyxZzOuYWpSykBKtbxMP7DnCZ5ofstKKIByUtJuknAPJv4S3kRc5CMN4=w1366-h630-rw']))->save();
        (new \App\User(['username'=>'udara', 'password'=>\Illuminate\Support\Facades\Hash::make('udara1234'), 'firstName'=>'Udara', 'lastName'=>'Bibile', 'phone'=>'0718723678', 'userLevelId'=>2, 'isActive'=>true, 'image' => 'https://lh4.googleusercontent.com/7p5jsWq-ZAy5bhUnLC7Tf_WJ5C6xQp0bbra9S4rH9oyBTIPH7ZnOEG7EkYHfk4dJj4Xm0C1hHxUJPQs=w1366-h630-rw']))->save();

        (new \App\User(['username'=>'madhawa', 'password'=>\Illuminate\Support\Facades\Hash::make('madhawa1234'), 'firstName'=>'Madhawa', 'lastName'=>'Vidanapathirana', 'phone'=>'0756374125', 'userLevelId'=>3, 'isActive'=>true, 'image' => 'https://lh5.googleusercontent.com/RgXpIE0HC51xTyelzuBNJU2in0gWQc40l04rCuT9kwSLU-KkIgOiFs6Ge7iA5Id99313YM-faAkCgeU=w1366-h630']))->save();
        (new \App\User(['username'=>'nimash', 'password'=>\Illuminate\Support\Facades\Hash::make('nimash1234'), 'firstName'=>'Nimash', 'lastName'=>'Dilanka', 'phone'=>'0721150439', 'userLevelId'=>3, 'isActive'=>true, 'image' => 'https://lh4.googleusercontent.com/4_g6QgHqXTD04_GktHuEnYBXp8XXcwz5nyIdTjFhQwfvgRbG8EWMCNtNso2JK2fU-ajApA4Xn-j7SVI=w1366-h630']))->save();

        (new \App\User(['username'=>'0777111222', 'password'=>\Illuminate\Support\Facades\Hash::make('kasun1234'), 'firstName'=>'Kasun', 'lastName'=>'Sanjaya', 'phone'=>'0777111222', 'userLevelId'=>4, 'isActive'=>true, 'image' => 'https://lh6.googleusercontent.com/TjCzrw6J_DCIUV_1CyGBShC0A-2hs1fqAI7CqKbFFPWI59gUB70Uk8QWBplF0lJDx-67OUbjKXuxHu4=w1366-h630-rw']))->save();
    }
}
