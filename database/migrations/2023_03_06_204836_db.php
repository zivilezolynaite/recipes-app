<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        DROP TABLE IF EXISTS `categories`;
        CREATE TABLE `categories` (
          `id` int NOT NULL AUTO_INCREMENT,
          `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `is_active` tinyint(1) DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `deleted_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        INSERT INTO `categories` (`id`, `name`, `created_at`, `is_active`, `updated_at`, `deleted_at`) VALUES
        (10,	'Valgome sveikiau!',	'2023-03-07 11:20:11',	1,	'2023-03-07 11:20:17',	NULL),
        (11,	'Grilio patiekalai',	'2023-03-07 11:20:33',	1,	'2023-03-07 14:49:25',	'2023-03-07 14:49:25'),
        (12,	'Apkepai',	'2023-03-07 11:20:46',	1,	'2023-03-07 14:49:37',	'2023-03-07 14:49:37'),
        (13,	'Blynai, sklindžiai',	'2023-03-07 11:35:07',	1,	'2023-03-07 11:35:07',	NULL),
        (14,	'Desertai',	'2023-03-07 11:35:12',	1,	'2023-03-07 14:50:03',	'2023-03-07 14:50:03'),
        (15,	'Gėrimai',	'2023-03-07 11:35:18',	1,	'2023-03-07 14:50:05',	'2023-03-07 14:50:05'),
        (16,	'Karšti patiekalai',	'2023-03-07 11:35:27',	1,	'2023-03-07 11:35:27',	NULL),
        (17,	'Uogienės',	'2023-03-07 11:35:31',	1,	'2023-03-07 14:50:13',	'2023-03-07 14:50:13'),
        (18,	'Košės, tyrės',	'2023-03-07 12:04:44',	1,	'2023-03-07 14:50:23',	'2023-03-07 14:50:23'),
        (19,	'Kremai ir padažai',	'2023-03-07 12:04:51',	1,	'2023-03-07 14:50:26',	'2023-03-07 14:50:26'),
        (20,	'Picos',	'2023-03-07 12:04:57',	1,	'2023-03-07 14:50:27',	'2023-03-07 14:50:27'),
        (21,	'Pyragai, kepiniai',	'2023-03-07 12:05:06',	1,	'2023-03-07 14:50:33',	'2023-03-07 14:50:33'),
        (22,	'Salotos, mišrainės',	'2023-03-07 12:05:22',	1,	'2023-03-07 12:05:22',	NULL),
        (23,	'Garnyrai',	'2023-03-07 12:05:31',	1,	'2023-03-07 14:50:43',	'2023-03-07 14:50:43'),
        (24,	'Sriubos',	'2023-03-07 12:05:36',	1,	'2023-03-07 12:05:36',	NULL),
        (25,	'Sumuštiniai',	'2023-03-07 12:05:40',	1,	'2023-03-07 12:05:40',	NULL),
        (26,	'Troškiniai',	'2023-03-07 12:05:44',	1,	'2023-03-07 12:05:44',	NULL),
        (27,	'Užkandžiai',	'2023-03-07 12:05:49',	1,	'2023-03-07 14:50:51',	'2023-03-07 14:50:51'),
        (28,	'Užkandžiai',	'2023-03-07 14:51:04',	0,	'2023-03-07 14:51:12',	NULL);

        DROP TABLE IF EXISTS `failed_jobs`;
        CREATE TABLE `failed_jobs` (
          `id` bigint unsigned NOT NULL AUTO_INCREMENT,
          `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
          `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
          `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
          `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
          `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`),
          UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        DROP TABLE IF EXISTS `ingredients`;
        CREATE TABLE `ingredients` (
          `id` int NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `is_active` tinyint(1) NOT NULL DEFAULT '0',
          `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
          `updated_at` timestamp NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

        INSERT INTO `ingredients` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
        (7,	'Varškė',	1,	'2023-03-07 11:13:10',	'2023-03-07 11:13:10'),
        (8,	'Vištiena',	1,	'2023-03-07 11:13:26',	'2023-03-07 11:13:26'),
        (9,	'Obuoliai',	1,	'2023-03-07 13:15:11',	'2023-03-07 11:15:11'),
        (10,	'Moliūgai',	1,	'2023-03-07 11:15:29',	'2023-03-07 11:15:29'),
        (11,	'Bulvės',	1,	'2023-03-07 11:15:58',	'2023-03-07 11:15:58'),
        (12,	'Pomidorai',	1,	'2023-03-07 11:16:09',	'2023-03-07 11:16:09'),
        (13,	'Cukinija',	1,	'2023-03-07 11:17:28',	'2023-03-07 11:17:28'),
        (14,	'Kopūstai',	1,	'2023-03-07 11:17:42',	'2023-03-07 11:17:42'),
        (15,	'Agurkai',	1,	'2023-03-07 11:17:47',	'2023-03-07 11:17:47'),
        (16,	'Makaronai',	1,	'2023-03-07 11:17:54',	'2023-03-07 11:17:54'),
        (17,	'Sūris',	1,	'2023-03-07 11:18:00',	'2023-03-07 11:18:00'),
        (18,	'Burokėliai',	1,	'2023-03-07 11:18:06',	'2023-03-07 11:18:06'),
        (19,	'Lašiša',	1,	'2023-03-07 11:18:12',	'2023-03-07 11:18:12'),
        (20,	'Kiaulienos faršas',	1,	'2023-03-07 11:18:24',	'2023-03-07 11:18:24'),
        (21,	'Jautienos faršas',	1,	'2023-03-07 11:18:33',	'2023-03-07 11:18:33'),
        (22,	'Vištienos faršas',	1,	'2023-03-07 11:18:43',	'2023-03-07 11:18:43'),
        (23,	'Uogos',	1,	'2023-03-07 11:18:54',	'2023-03-07 11:18:54'),
        (24,	'Grybai',	1,	'2023-03-07 11:18:59',	'2023-03-07 11:18:59'),
        (25,	'Silkė',	1,	'2023-03-07 11:19:03',	'2023-03-07 11:19:03'),
        (26,	'Kiaušiniai',	1,	'2023-03-07 14:22:27',	'2023-03-07 14:22:27'),
        (27,	'Avinžirniai',	1,	'2023-03-07 14:40:52',	'2023-03-07 14:40:52');

        DROP TABLE IF EXISTS `migrations`;
        CREATE TABLE `migrations` (
          `id` int unsigned NOT NULL AUTO_INCREMENT,
          `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `batch` int NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        DROP TABLE IF EXISTS `password_resets`;
        CREATE TABLE `password_resets` (
          `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        DROP TABLE IF EXISTS `personal_access_tokens`;
        CREATE TABLE `personal_access_tokens` (
          `id` bigint unsigned NOT NULL AUTO_INCREMENT,
          `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `tokenable_id` bigint unsigned NOT NULL,
          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
          `abilities` text COLLATE utf8mb4_unicode_ci,
          `last_used_at` timestamp NULL DEFAULT NULL,
          `expires_at` timestamp NULL DEFAULT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
          KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        DROP TABLE IF EXISTS `products`;
        CREATE TABLE `products` (
          `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `price` double(8,2) DEFAULT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        DROP TABLE IF EXISTS `recipe_ingredient`;
        CREATE TABLE `recipe_ingredient` (
          `recipe_id` int NOT NULL,
          `ingredient_id` int NOT NULL,
          KEY `recipe_id` (`recipe_id`),
          KEY `ingredient_id` (`ingredient_id`),
          CONSTRAINT `recipe_ingredient_ibfk_3` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          CONSTRAINT `recipe_ingredient_ibfk_4` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

        INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`) VALUES
        (32,	8),
        (32,	11),
        (32,	12),
        (32,	13),
        (33,	13),
        (33,	14),
        (33,	15),
        (33,	21),
        (34,	12),
        (34,	14),
        (34,	19),
        (35,	10),
        (35,	11),
        (35,	15),
        (35,	26),
        (36,	8),
        (36,	12),
        (36,	13),
        (36,	17),
        (37,	11),
        (37,	17),
        (37,	24),
        (38,	8),
        (38,	12),
        (38,	13),
        (38,	14),
        (38,	15),
        (38,	16),
        (38,	17),
        (38,	24),
        (39,	11),
        (39,	17),
        (39,	24),
        (39,	26),
        (40,	11),
        (40,	21),
        (40,	24),
        (41,	10),
        (41,	13),
        (41,	17),
        (41,	18),
        (41,	26),
        (42,	24),
        (42,	25),
        (42,	26),
        (42,	27),
        (43,	12),
        (43,	13),
        (43,	17),
        (43,	19);

        DROP TABLE IF EXISTS `recipes`;
        CREATE TABLE `recipes` (
          `id` int NOT NULL AUTO_INCREMENT,
          `name` varchar(255) DEFAULT NULL,
          `category` int DEFAULT NULL,
          `description` text,
          `image` varchar(100) DEFAULT NULL,
          `is_active` tinyint(1) DEFAULT '0',
          `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
          `updated_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          KEY `category` (`category`),
          CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

        INSERT INTO `recipes` (`id`, `name`, `category`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
        (32,	'Traškios kopūstų ir morkų salotos su vištiena',	10,	'Labai greitai paruošiamos kopūstų salotos prie mėsos ar paukštienos. Salotų gardumo paslaptis - ypatingas padažas, kuris, tikiu, patiks ir Jums! Receptą radau rusiškame tinklaraštyje ir pakoregavau pagal savo šeimos skonius.',	'1334773-22207.jpeg',	1,	'2023-03-07 19:26:01',	'2023-03-07 17:26:01'),
        (33,	'Kepsniai su šonine keptuvėje',	16,	'Sultingi, sotūs, aromatingi ir labai skanūs kepsniai, kuriems bus sunku atsispirti. Nors ir paruošimas gali skambėti sudėtingai, tačiau taip tikrai nėra. Šie kepsniai nustebins visus mėsos mėgėjus! Tai itališko patiekalo Saltimbocca įkvėpta alternatyva. Įprastai naudojama veršiena, tačiau mūsų šeimoje labiau mėgiama kiauliena, būtent su ja ir ruoštas patiekalas.',	'1378671-44887.jpeg',	1,	'2023-03-07 19:26:16',	'2023-03-07 17:26:16'),
        (34,	'Kremiškos kiaušinių salotos su žalumynais',	22,	'Švelnios, kremiškos ir labai skanios salotos, kurias gardu skanauti vienas, dėti ant duonos riekelės. Puiki idėja pusryčiams, užkandžiams ar tiesiog, kai norisi greitai ir skaniai, o ypač - jei reikia sunaudoti virtų kiaušinių likutį.',	'5887518-44866.jpeg',	1,	'2023-03-07 19:26:27',	'2023-03-07 17:26:27'),
        (35,	'Tailandietiška vištienos ir makaronų sriuba',	24,	'Dievinu Azijos virtuvę, tad šiandien dalinuosi paprastu ir greitai pagaminamu patiekalu - raudonojo kario sriuba su makaronais ir vištiena! Be galo gardi, aromatinga ir soti sriuba, kuri atstos visus restoraninius variantus, o geriausia, jog pasiruošti ją galėsite, kada tik užsimanysite ir daug pigiau bei gausis didesnis kiekis. Beje, jei norite vegetariško varianto, vištieną keiskite papildomomis daržovėmis, pavyzdžiui įdėkite brokolį ar pievagrybių.',	'7955377-40914.jpeg',	1,	'2023-03-07 19:26:37',	'2023-03-07 17:26:37'),
        (36,	'Vištienos kepsneliai su sūriu',	10,	'Vištienos patiekalai tikrai dažnai puikuojasi ant pietų stalų, o šie tikrai taip pat turėtų rasti savo vietą. Pavyksta labai skanūs, švelnaus skonio, bet tokie, kurių sunku atsivalgyti, taip jau turbūt būna su tuo paprastumu - tobulumas paprastume, kuriam sunku atsispirti.',	'6813748-44706.jpeg',	1,	'2023-03-07 19:26:53',	'2023-03-07 17:26:53'),
        (37,	'Orkaitėje keptos bulvės su įdaru',	16,	'Labai sotus patiekalas, kurį nesudėtinga pagaminti. Tinka tiekti ir kaip sotų užkandį ar garnyrą. Labai skanu valgyti su grietine arba rančos ar kitu mėgstamu padažu ar vienas.',	'4172339-34416.jpeg',	1,	'2023-03-07 19:27:12',	'2023-03-07 17:27:12'),
        (38,	'Sotus vištienos ir daržovių troškinys',	26,	'Tikras rudeniškas patiekalas visai šeimai. Itin sotus, gardus ir kupinas švelnaus skonio. Gaminamas su vištiena, tačiau galite ją pakeisti kita mėgstama mėsa ar dėti kitų mėgstamų daržovių. Įkvėpimo šiam troškiniui sėmiausi iš CarlsBadCravings tinklaraščio.',	'1837616-33473.jpeg',	1,	'2023-03-07 19:27:26',	'2023-03-07 17:27:26'),
        (39,	'Greiti bulvių blynai - traškūs išorėje',	13,	'Labai greitai ir lengvai paruošiami blynai, kuriems nereikia daug ingredientų, o puikaus skonio blyneliais gardžiuosis visa šeima! Labai skanu valgyti su grietine, jogurtu, pievagrybių padažu, pabarstyti smulkintų krapų ar tiesiog valgyti vienus!',	'6781097-15431.jpeg',	1,	'2023-03-07 19:27:59',	'2023-03-07 17:27:59'),
        (40,	'Bulviniai blynai su faršu',	13,	'Bulves nulupame ir smulkiai sutarkuojame drauge su svogūnu, rankomis šiek tiek nuspaudžiame skystį. Įmušame kiaušinius, įdedame druskos bei pipirų, gerai išmaišome.',	'7294385-44383.jpeg',	1,	'2023-03-07 19:30:16',	'2023-03-07 17:30:16'),
        (41,	'Žirnių kepsneliai',	10,	'Orkaitėje kepti daržovių iešmeliai – gardus garnyras prie daugelio patiekalų. Vasarą juos galite kepti lauke, kepsninėje, o kai už lango šalta – namų virtuvėje, orkaitėje. Iešmelius patiekę su „Naturli“ žirnių kepsneliais ir pikantišku avokadų padažu, paruošite sotų užkandį ar lengvą vakarienę, gardžią visiems, bet tinkančią ir vegetarams ar veganams. Visi produktai dera puikiai, tad pažadame tikrą skonių šventę!',	'2355346-24074.jpeg',	1,	'2023-03-07 19:31:01',	'2023-03-07 17:31:01'),
        (42,	'Avinžirnių karis su daržovėmis',	16,	'Šis Tailando virtuvės įkvėptas karis yra vienas tų genialiai paprastų patiekalų, kurie mus gelbėja, kai norisi greitos, maistingos, bet nenuobodžios vakarienės. Daržoves jam šįkart naudojome savo mėgstamiausias, bet jas drąsiai koreguokite pagal savo skonį ir spintelės turinį, pavyzdžiui, vietoje morkos galite įdėti saldžią bulvę, vietoje brokolio - špinatų ar kaip tik sugalvosite.',	'1856485-33473.jpeg',	1,	'2023-03-07 19:33:09',	'2023-03-07 17:33:09'),
        (43,	'Greiti tortilijų suktinukai su dešrelėmis',	25,	'Greitiems pietums, išvykai ar pasisėdėjimui su draugais - puiki išeitis! Pavyksta sotūs, be galo skanūs ir paprastai paruošiami, Vietoje dešrelių galite naudoti kitą mėgstamą mėsytę, o kepti galima ir keptuvėje iš visų pusių vis pavartant.',	'2892733-42822.jpeg',	1,	'2023-03-07 19:33:32',	'2023-03-07 17:33:32');

        DROP TABLE IF EXISTS `users`;
        CREATE TABLE `users` (
          `id` bigint unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `email_verified_at` timestamp NULL DEFAULT NULL,
          `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `role` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `users_email_unique` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
