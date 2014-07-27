<?php

spl_autoload_register(function ($class) {
    include('system/' . implode('/', explode("\\", $class)) . '.php');
});

use Database as DB;

try {
    $db = new DB\MySQL('cvdb', 'localhost', 'root', 'root');
} catch (Exception $e) {
    echo "Connection failed, exiting.";
    exit;
}

use CVData as CV;

$personal = new CV\PersonalStruct();
$personal->isModified = true;
$personal->isNew = true;

$personal->lastname =   'Oravecz';
$personal->firstname =  'Tibor';
$personal->birthdate =  '1982-12-06';
$personal->email =      'tibor.oravecz@gmail.com';
$personal->phone =      '+36-70-415-5005';

$personalModel = new CV\PersonalModel($db);
$personalModel->save($personal);

$address = new CV\AddressStruct();
$address->country       = 'Magyarország';
$address->postcode      = '1191';
$address->city          = 'Budapest';
$address->address1      = 'Arany János u. 24.';
$address->address2      = '1 emelet 3.';
$address->isModified = true; $address->isNew = true;
$addressModel = new CV\AddressModel($db);
$addressModel->save($address);

$school = new CV\SchoolStruct();
$school->isModified = true;
$school->isNew = true;
$school->name           = 'Kun László Gimnázium';
$school->education      = 'Gimnáziumi érettségi';
$school->city           = 'Tolna';
$school->start_date     = '2005-09-01';
$school->end_date       = '2009-06-01';
$schoolModel = new CV\SchoolModel($db);
$schoolModel->save($school);

$job1 = new CV\JobStruct();
$job2 = new CV\JobStruct();
$job3 = new CV\JobStruct();
$job1->isModified = true; $job1->isNew = true;
$job2->isModified = true; $job2->isNew = true;
$job3->isModified = true; $job3->isNew = true;

$job1->company_name                 = 'CHID Bt.';
$job1->company_headquarter          = 'Szekszárd';
$job1->jobname                      = 'Programozó, Rendszergazda';
$job1->start_date                   = '2007-09-01';
$job1->end_date                     = '2008-12-01';
$job1->description                  = 'Belső elszámolási rendszer tervezése és fejlesztése, informatikai rendszer kiépítése.';

$job2->company_name                 = 'C-Net Informatikai Zrt.';
$job2->company_headquarter          = 'Szombathely';
$job2->jobname                      = 'Programozó';
$job2->start_date                   = '2009-09-01';
$job2->end_date                     = '2013-01-01';
$job2->description                  =  'Egyedi Linux alapú operációs rendszer fejlesztése beépített hálózati eszközökre. ';
$job2->description                 .=  'Az operációs rendszerhez szükséges software -ek telepítése és integrálása. ';
$job2->description                 .= 'ANSI C, Bash, Perl fejlesztés, virtulizációs technikák, hálózati management, szerveralkalmazások.';

$job3->company_name                 = 'Ideasol Magyarország Kft.';
$job3->company_headquarter          = 'Budapest';
$job3->jobname                      = 'Vezető Programozó, Rendszergazda';
$job3->start_date                   = '2013-03-01';
$job3->description                  =  'CRM Rendszer tervezése és fejlesztése, project management. ';
$job3->description                 .= 'Új IT technológiák felkutatása, integrálása, használata, oktatása. ';
$job3->description                 .= 'A cég szervereinek telepítése, fejlesztése, felügyelete. ';
$job3->description                 .= 'OpenCart alapú webáruház fejlesztése.';

$jobModel = new CV\JobModel($db);
$jobModel->save($job1);
$jobModel->save($job2);
$jobModel->save($job3);

$experiences = array();
$experience = new CV\ExperienceStruct();
$experience->experience = ''; $experience->level = ''; $experiences[] = $experience;

$experience = new CV\ExperienceStruct();
$experience->experience = 'PHP5';                           $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'MySQL';                          $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Objektumorientált szemléletmód'; $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Design Patterns';                $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Software tervezés (UML)';        $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Javascript, Ajax';               $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'jQuery';                         $experience->level = 'Közepes';  $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'HTML5';                          $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'CSS';                            $experience->level = 'Alapok';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'XML';                            $experience->level = 'Közepes';  $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Agilis módszertan (kanban)';     $experience->level = 'Alapok';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'WebService (SOAP, REST)';        $experience->level = 'Alapok';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Linux';                          $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Rendszerek integrálása';         $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Bash';                           $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'CRM/ERP rendszerek';             $experience->level = 'Szakértő'; $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Perl';                           $experience->level = 'Alapok';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'SVN';                            $experience->level = 'Haladó';   $experiences[] = $experience;
$experience = new CV\ExperienceStruct();
$experience->experience = 'Git';                            $experience->level = 'Alapok';   $experiences[] = $experience;

$experienceModel = new CV\ExperienceModel($db);
/**
 * @var CV\ExperienceStruct $exp
 */
foreach($experiences as $exp) {
    $exp->isModified = true;
    $exp->isNew = true;
    $experienceModel->save($exp);
}

$extra1 = new CV\ExtraStruct();
$extra1->name =         'Kommunikációs készségek';
$extra1->description =  'Jó kommunikációs készség, mint az ügyfelekkel, mint a kollégákkal.';
$extra1->description .= 'Képes vagyok az ügyfelekkel telefonon, emailben tárgyalni, illetve személyes tárgyaláson is voltam már.';
$extra1->description .= 'A kollégákkal személyes megbeszélések, ötletelések, új információk megosztása, oktatása gyakori feladatom.';
$extra1->description .= 'A szakmai angolt megértem, tudok dokumentációt olvasni, akár írni is.';
$extra1->isModified = true; $extra1->isNew = true;

$extra2 = new CV\ExtraStruct();
$extra2->name =         'Szervezési/vezetői készségek';
$extra2->description =  'Képes vagyok egy projectet átlátni, leosztani feladatokra, mérföldkövekre, melyekhez határidőket lehet csatolni.';
$extra2->description .= 'A feladatokat ki tudom osztani és ellenőrizni annak teljesülését. Csapatmunkában, mint ';
$extra2->description .= 'fejlesztő, mint vezető megállom a helyem.';
$extra2->isModified = true; $extra2->isNew = true;

$extraModel = new CV\ExtraModel($db);
$extraModel->save($extra1);
$extraModel->save($extra2);