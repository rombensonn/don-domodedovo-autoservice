<?php
declare(strict_types=1);

session_start();
date_default_timezone_set('Europe/Moscow');

$business = [
    'name' => 'Дон',
    'rating' => '4,7',
    'ratingValue' => '4.7',
    'ratingsCount' => 385,
    'reviewsCount' => 127,
    'phone' => '+7 (995) 509-51-51',
    'phoneHref' => '+79955095151',
    'address' => 'Московская область, городской округ Домодедово, М-4 Дон, 33-й километр, с4к1',
    'shortAddress' => 'М-4 Дон, 33-й километр, с4к1',
    'mapUrl' => 'https://yandex.ru/maps/-/CPXYY2pa',
    'hoursText' => 'Ежедневно 09:00-21:00',
];

$openAt = new DateTimeImmutable('today 09:00');
$closeAt = new DateTimeImmutable('today 21:00');
$now = new DateTimeImmutable('now');
$isOpen = $now >= $openAt && $now < $closeAt;
$openStatus = $isOpen ? 'Открыто до 21:00' : 'Сейчас закрыто, откроется в 09:00';

$serviceGroups = [
    [
        'slug' => 'diagnostics',
        'title' => 'Диагностика',
        'need' => 'Когда непонятно, что сломалось',
        'summary' => 'Быстрый первый шаг перед ремонтом: двигатель, подвеска, тормоза, коробка, электрика и комплексная проверка.',
        'items' => [
            ['Диагностика двигателя', 500],
            ['Диагностика подвески', 500],
            ['Диагностика ходовой части автомобиля', 500],
            ['Диагностика тормозной системы', 500],
            ['Диагностика АКПП', 500],
            ['Диагностика МКПП', 500],
            ['Диагностика рулевого управления', 500],
            ['Диагностика электрооборудования', 500],
            ['Диагностика топливной системы', 500],
            ['Диагностика турбины', 500],
            ['Диагностика автокондиционера', 500],
            ['Комплексная диагностика автомобиля', 1500],
        ],
    ],
    [
        'slug' => 'maintenance',
        'title' => 'ТО и масла',
        'need' => 'Плановое обслуживание без долгого простоя',
        'summary' => 'Замена масла, фильтров, свечей и жидкостей. Подходит для регулярного обслуживания перед дорогой.',
        'items' => [
            ['Плановое ТО автомобиля', 500],
            ['Экспресс-замена масла', 500],
            ['Замена масла в двигателе', 500],
            ['Замена масла АКПП', 500],
            ['Аппаратная замена масла в АКПП', 2000],
            ['Замена масла МКПП', 500],
            ['Замена масла в вариаторе автомобиля', 500],
            ['Замена воздушного фильтра', 100],
            ['Замена салонного фильтра', 200],
            ['Замена топливного фильтра', 200],
            ['Замена свечей зажигания', 150],
            ['Замена тормозной жидкости в автомобиле', 500],
            ['Предпродажная подготовка автомобиля', 1000],
        ],
    ],
    [
        'slug' => 'engine',
        'title' => 'Двигатель',
        'need' => 'Перегрев, троение, шум, потеря тяги',
        'summary' => 'Диагностика, замена узлов, ремонт бензиновых и дизельных двигателей, ГРМ, турбины и форсунки.',
        'items' => [
            ['Диагностика двигателя', 500],
            ['Замер компрессии в двигателе', 500],
            ['Замена свечей зажигания', 150],
            ['Замена свечей накаливания', 300],
            ['Замена масла в двигателе', 500],
            ['Замена бензонасоса', 1500],
            ['Замена помпы двигателя', 1000],
            ['Замена ремня ГРМ', 2000],
            ['Замена цепи ГРМ', 5000],
            ['Замена турбины', 2000],
            ['Замена форсунок', 500],
            ['Промывка инжектора', 700],
            ['Промывка форсунок', 700],
            ['Ремонт ГБЦ', 2500],
            ['Снятие или установка ГБЦ двигателя', 2500],
            ['Замена прокладки ГБЦ', 3500],
            ['Капитальный ремонт двигателя', 10000],
            ['Замена бензинового двигателя', 15000],
            ['Замена дизельного двигателя', 15000],
        ],
    ],
    [
        'slug' => 'suspension',
        'title' => 'Подвеска',
        'need' => 'Стук, вибрации, уводит машину',
        'summary' => 'Диагностика и замена основных элементов подвески, включая амортизаторы, рычаги, ступицы и шаровые.',
        'items' => [
            ['Диагностика подвески', 500],
            ['Диагностики пневматической подвески', 500],
            ['Замена амортизаторов подвески', 1200],
            ['Замена переднего амортизатора', 1200],
            ['Замена заднего амортизатора', 500],
            ['Замена втулок стабилизатора', 200],
            ['Замена опорного подшипника', 1200],
            ['Замена подшипника ступицы', 500],
            ['Замена рычагов подвески', 500],
            ['Замена сайлентблоков', 300],
            ['Замена шаровой опоры', 300],
            ['Замена ступицы', 1000],
            ['Ремонт пневматической подвески', 500],
        ],
    ],
    [
        'slug' => 'steering',
        'title' => 'Рулевое управление',
        'need' => 'Люфт, течь, тяжело крутится руль',
        'summary' => 'ШРУСы, рулевые тяги, рейки, гидроусилитель и связанные работы.',
        'items' => [
            ['Замена ШРУСа', 1000],
            ['Замена пыльника ШРУСа', 1000],
            ['Замена рулевого наконечника', 300],
            ['Замена рулевой тяги', 400],
            ['Замена рулевой рейки', 1500],
            ['Ремонт рулевой рейки', 1500],
            ['Ремонт гидравлической рулевой рейки', 5000],
            ['Ремонт электрических рулевых реек', 5000],
            ['Замена насоса гидроусилителя', 1000],
            ['Ремонт гидроусилителя', 1500],
        ],
    ],
    [
        'slug' => 'electric',
        'title' => 'Электрика',
        'need' => 'Не заводится, не горит, ошибка на панели',
        'summary' => 'Диагностика электрооборудования, стартеры, генераторы, датчики, фары и проводка.',
        'items' => [
            ['Диагностика электрооборудования в автомобиле', 500],
            ['Замена автомобильного генератора', 500],
            ['Ремонт автомобильного генератора', 500],
            ['Замена стартера автомобиля', 500],
            ['Ремонт стартера автомобиля', 500],
            ['Замена датчика кислорода в автомобиле', 500],
            ['Замена катушки зажигания автомобиля', 500],
            ['Замена фар автомобиля', 500],
            ['Регулировка фар автомобиля', 500],
            ['Зарядка автомобильной АКБ', 500],
            ['Замена электронного блока управления в автомобиле', 500],
        ],
    ],
    [
        'slug' => 'body',
        'title' => 'Кузовной ремонт',
        'need' => 'Вмятины, бампер, пороги, геометрия',
        'summary' => 'Локальный кузовной ремонт, рихтовка, стапель, сварка и восстановление деталей.',
        'items' => [
            ['Кузовной ремонт', 1000],
            ['Локальный ремонт кузова', 1000],
            ['Восстановление геометрии кузова автомобиля', 1000],
            ['Постановка на стапель', 2000],
            ['Стапельные работы', 1000],
            ['Сварка кузова', 1000],
            ['Замена бампера', 1000],
            ['Ремонт бампера', 500],
            ['Замена двери автомобиля', 1000],
            ['Замена крыла автомобиля', 1000],
            ['Ремонт капота', 1000],
            ['Ремонт порогов автомобиля', 1000],
            ['Удаление вмятин с кузова без покраски', 1000],
            ['Удаление царапин без покраски', 1000],
        ],
    ],
    [
        'slug' => 'paint',
        'title' => 'Покраска',
        'need' => 'Сколы, царапины, деталь или весь кузов',
        'summary' => 'Локальная покраска, покраска отдельных деталей, дисков и полный окрас автомобиля.',
        'items' => [
            ['Покраска сколов и царапин автомобиля', 500],
            ['Устранение сколов кузова автомобиля', 500],
            ['Локальная покраска автомобиля', 1000],
            ['Локальная покраска бампера', 500],
            ['Покраска бампера', 4000],
            ['Покраска двери автомобиля', 5000],
            ['Покраска крыла автомобиля', 5000],
            ['Покраска капота', 8000],
            ['Покраска крыши автомобиля', 8000],
            ['Покраска детали автомобиля', 5000],
            ['Покраска кузова автомобиля', 25000],
            ['Полная покраска автомобиля', 25000],
            ['Покраска автомобиля "хамелеоном"', 30000],
        ],
    ],
    [
        'slug' => 'climate',
        'title' => 'Кондиционер и отопление',
        'need' => 'Не холодит, течет, печка не греет',
        'summary' => 'Заправка, диагностика и ремонт кондиционера, радиаторов, компрессора и отопителя.',
        'items' => [
            ['Диагностика автокондиционера', 500],
            ['Заправка автокондиционера', 1000],
            ['Опрессовка автокондиционера', 500],
            ['Антибактериальная обработка автокондиционера', 1000],
            ['Ремонт автокондиционера', 500],
            ['Замена компрессора автокондиционера', 1000],
            ['Ремонт компрессора автокондиционера', 500],
            ['Замена радиатора охлаждения', 700],
            ['Замена радиатора печки', 1500],
            ['Ремонт климат-контроля в автомобиле', 500],
        ],
    ],
    [
        'slug' => 'tires',
        'title' => 'Шины, диски, сход-развал',
        'need' => 'Колесо, вибрация, увод после удара',
        'summary' => 'Шиномонтаж, ремонт шин, правка и покраска дисков, 3D сход-развал.',
        'items' => [
            ['Шиномонтаж', 500],
            ['Сход-развал в 3D', 1000],
            ['Вулканизация', 500],
            ['Ремонт боковых порезов', 300],
            ['Правка колёсных дисков', 500],
            ['Сварка колёсных дисков', 500],
            ['Покраска колёсных дисков', 500],
        ],
    ],
    [
        'slug' => 'wash',
        'title' => 'Мойка и уход',
        'need' => 'Привести машину в порядок',
        'summary' => 'Мойка, химчистка, полировка, детейлинг и защитные покрытия.',
        'items' => [
            ['Автохимчистка', 3000],
            ['Полировка кузова', 3000],
            ['Полировка фар', 500],
            ['Абразивная полировка кузова', 3000],
            ['Кварцевое покрытие автомобиля', 5000],
            ['Нанесение покрытия Ceramic Pro на авто', 10000],
            ['Детейлинг автомобиля', 5000],
        ],
    ],
    [
        'slug' => 'moto',
        'title' => 'Мототехника',
        'need' => 'Скутер, мотоцикл, вездеход',
        'summary' => 'Базовые работы по мототехнике из прайса сервиса.',
        'items' => [
            ['Ремонт мотоциклов', 500],
            ['Ремонт скутеров', 500],
            ['Ремонт вездеходов', 500],
        ],
    ],
];

$primaryServices = [
    ['Диагностика двигателя', 'diagnostics'],
    ['Экспресс-замена масла', 'maintenance'],
    ['Диагностика подвески', 'suspension'],
    ['Шиномонтаж', 'tires'],
    ['Сход-развал в 3D', 'tires'],
    ['Заправка автокондиционера', 'climate'],
    ['Кузовной ремонт', 'body'],
    ['Покраска бампера', 'paint'],
];

$features = [
    'Оплата картой и наличными',
    'Парковка',
    'Wi-Fi',
    'Туалет',
    'Зона ожидания отмечена в отзывах',
    'Можно с животными',
    'Предварительная запись',
    'Гарантия',
    'Запчасти под заказ',
    'Ремонт по ОСАГО',
    'Доступен вход на инвалидной коляске',
    'Парковка для людей с инвалидностью',
];

$reviews = [
    [
        'name' => 'Вадим С.',
        'date' => '13 марта',
        'text' => 'Сделали подвеску, шиномонтаж, разобрались с парктрониками. Все быстро. Хорошая зона ожидания. Удобная транспортная доступность.',
    ],
    [
        'name' => 'Ксения Князева',
        'date' => '21 апреля 2025',
        'text' => 'По дороге замкнуло колодку на заднем колесе. Ребята помогли быстро и оперативно.',
    ],
    [
        'name' => 'Виктория Сергеевна',
        'date' => '30 октября 2024',
        'text' => 'Рекомендую этот сервис: честная диагностика, быстрый ремонт. Консультируют профессионально.',
    ],
    [
        'name' => 'Валерия',
        'date' => '27 мая 2022',
        'text' => 'Меняла масло и фильтры. На протяжении всего мероприятия мне объясняли каждый шаг.',
    ],
];

$faq = [
    [
        'q' => 'Почему цены указаны "от"?',
        'a' => 'В прайсе Яндекс.Карт указана стоимость работ от базового уровня. Итог зависит от модели автомобиля, состояния узла, сложности доступа и необходимости запчастей.',
    ],
    [
        'q' => 'Можно ли приехать без записи?',
        'a' => 'Да, сервис находится на трассе М-4 и принимает срочные обращения, но из-за потока машин лучше позвонить перед выездом и уточнить свободный пост.',
    ],
    [
        'q' => 'Как понять, что не навяжут лишние работы?',
        'a' => 'Начните с диагностики. Попросите показать список работ, цену и причину каждой замены до начала ремонта. Именно для этого на сайте вынесен блок согласования.',
    ],
    [
        'q' => 'Есть ли гарантия?',
        'a' => 'В карточке бизнеса указана гарантия. Конкретные условия лучше уточнить при приемке автомобиля, потому что они зависят от вида работ и запчастей.',
    ],
    [
        'q' => 'Чем заняться во время ожидания?',
        'a' => 'В карточке указаны Wi-Fi, туалет и парковка. В отзывах также отмечают зону ожидания и удобное расположение комплекса.',
    ],
];

function h(string|int|float|null $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function rub(int $value): string
{
    return number_format($value, 0, ',', ' ') . ' ₽';
}

function minPrice(array $items): int
{
    $prices = array_map(static fn(array $item): int => (int)$item[1], $items);
    return min($prices);
}

function maxPrice(array $items): int
{
    $prices = array_map(static fn(array $item): int => (int)$item[1], $items);
    return max($prices);
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$formErrors = [];
$formSuccess = false;
$formValues = [
    'name' => '',
    'phone' => '',
    'service' => '',
    'car' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formValues = [
        'name' => trim((string)($_POST['name'] ?? '')),
        'phone' => trim((string)($_POST['phone'] ?? '')),
        'service' => trim((string)($_POST['service'] ?? '')),
        'car' => trim((string)($_POST['car'] ?? '')),
        'message' => trim((string)($_POST['message'] ?? '')),
    ];

    $csrf = (string)($_POST['csrf_token'] ?? '');
    $honeypot = trim((string)($_POST['company'] ?? ''));
    $consent = isset($_POST['consent']);
    $phoneDigits = preg_replace('/\D+/', '', $formValues['phone']);

    if ($honeypot !== '') {
        $formSuccess = true;
    } else {
        if (!hash_equals($_SESSION['csrf_token'], $csrf)) {
            $formErrors[] = 'Обновите страницу и отправьте заявку еще раз.';
        }
        if (strlen((string)$phoneDigits) < 10) {
            $formErrors[] = 'Укажите телефон, чтобы мастер мог перезвонить.';
        }
        if (!$consent) {
            $formErrors[] = 'Подтвердите согласие на обработку данных.';
        }

        if (!$formErrors) {
            $storageDir = __DIR__ . DIRECTORY_SEPARATOR . 'storage';
            if (!is_dir($storageDir)) {
                mkdir($storageDir, 0775, true);
            }

            $leadFile = $storageDir . DIRECTORY_SEPARATOR . 'leads.csv';
            $isNewFile = !file_exists($leadFile);
            $handle = fopen($leadFile, 'ab');

            if ($handle === false) {
                $formErrors[] = 'Заявка не сохранилась. Позвоните по телефону ' . $business['phone'] . '.';
            } else {
                if ($isNewFile) {
                    fputcsv($handle, ['date', 'name', 'phone', 'service', 'car', 'message', 'source'], ';');
                }
                fputcsv($handle, [
                    (new DateTimeImmutable('now'))->format('Y-m-d H:i:s'),
                    $formValues['name'],
                    $formValues['phone'],
                    $formValues['service'],
                    $formValues['car'],
                    $formValues['message'],
                    'landing',
                ], ';');
                fclose($handle);

                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                $formSuccess = true;
                $formValues = ['name' => '', 'phone' => '', 'service' => '', 'car' => '', 'message' => ''];
            }
        }
    }
}

$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'AutoRepair',
    'name' => $business['name'],
    'description' => 'Автосервис на 33-м километре М-4 Дон: диагностика, ТО, двигатель, подвеска, кузовной ремонт, покраска, шиномонтаж и сход-развал.',
    'telephone' => $business['phone'],
    'address' => [
        '@type' => 'PostalAddress',
        'addressCountry' => 'RU',
        'addressRegion' => 'Московская область',
        'addressLocality' => 'городской округ Домодедово',
        'streetAddress' => 'М-4 Дон, 33-й километр, с4к1',
    ],
    'openingHoursSpecification' => [
        [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '09:00',
            'closes' => '21:00',
        ],
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $business['ratingValue'],
        'ratingCount' => $business['ratingsCount'],
        'reviewCount' => $business['reviewsCount'],
    ],
    'priceRange' => 'от 100 ₽',
    'sameAs' => [$business['mapUrl']],
];
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Автосервис Дон в Домодедово на М-4 - цены, услуги, запись</title>
    <meta name="description" content="Автосервис Дон на 33-м км М-4: рейтинг 4,7, 385 оценок, ежедневно 09:00-21:00. Диагностика от 500 ₽, ТО, двигатель, подвеска, кузовной ремонт, покраска, шиномонтаж.">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Автосервис Дон на М-4 Дон, 33-й километр">
    <meta property="og:description" content="Понятный прайс, быстрый звонок, маршрут в Яндекс.Картах и запись на ремонт автомобиля.">
    <meta property="og:image" content="assets/roadside-service-industrial.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preload" href="assets/roadside-service-industrial.png" as="image">
    <link rel="preload" href="assets/diagnostics-industrial.png" as="image">
    <link rel="stylesheet" href="assets/styles.css">
    <script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>
</head>
<body>
<a class="skip-link" href="#main">К содержанию</a>

<header class="site-header" data-header>
    <a class="brand" href="#top" aria-label="Автосервис Дон">
        <span class="brand-mark" aria-hidden="true">ДОН</span>
        <span>
            <strong><?= h($business['name']); ?></strong>
            <small>автосервис на М-4</small>
        </span>
    </a>
    <nav class="main-nav" aria-label="Основная навигация">
        <a href="#services">Услуги</a>
        <a href="#price">Цены</a>
        <a href="#trust">Доверие</a>
        <a href="#reviews">Отзывы</a>
        <a href="#contacts">Контакты</a>
    </nav>
    <div class="header-actions">
        <span class="open-pill <?= $isOpen ? 'is-open' : 'is-closed'; ?>"><?= h($openStatus); ?></span>
        <a class="btn btn-primary btn-small" href="tel:<?= h($business['phoneHref']); ?>">Позвонить</a>
    </div>
</header>

<main id="main">
    <section class="hero" id="top" aria-labelledby="hero-title">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <p class="eyebrow">Индустриальный автосервис на трассе</p>
            <h1 id="hero-title">Автосервис «Дон»: быстро понять поломку, цену и срок ремонта</h1>
            <p class="hero-lead">Диагностика, ТО, двигатель, подвеска, кузов, покраска, электрика, кондиционер, шиномонтаж и сход-развал. Рейтинг <?= h($business['rating']); ?> на Яндекс.Картах, <?= h($business['ratingsCount']); ?> оценок.</p>
            <div class="hero-actions" aria-label="Быстрые действия">
                <a class="btn btn-primary" href="tel:<?= h($business['phoneHref']); ?>">Позвонить <?= h($business['phone']); ?></a>
                <a class="btn btn-light" href="#lead-form">Записаться</a>
                <a class="btn btn-ghost" href="<?= h($business['mapUrl']); ?>" target="_blank" rel="noopener">Открыть карту</a>
            </div>
            <div class="hero-service-line" aria-label="Ключевые направления">
                <span>Диагностика</span>
                <span>ТО</span>
                <span>Двигатель</span>
                <span>Подвеска</span>
                <span>Кузов</span>
                <span>Шины</span>
            </div>
            <dl class="hero-facts" aria-label="Ключевые факты">
                <div>
                    <dt>График</dt>
                    <dd><?= h($business['hoursText']); ?></dd>
                </div>
                <div>
                    <dt>Диагностика</dt>
                    <dd>от 500 ₽</dd>
                </div>
                <div>
                    <dt>ТО</dt>
                    <dd>от 500 ₽</dd>
                </div>
                <div>
                    <dt>Запись</dt>
                    <dd>по телефону</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="section section-tight intent-section" aria-labelledby="intent-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Сначала выберите ситуацию</p>
                <h2 id="intent-title">Три понятных сценария вместо поиска по всему прайсу</h2>
                <p>Так клиент быстрее понимает, куда нажимать: срочный ремонт с трассы, плановое обслуживание или кузовные работы.</p>
            </div>
            <div class="intent-grid">
                <article class="intent-card">
                    <span class="intent-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M13 2 4 14h7l-1 8 10-13h-7l0-7Z"/></svg>
                    </span>
                    <h3>Срочно в дороге</h3>
                    <p>Перегрев, колесо, электрика, печка, тормоза или непонятный звук. Лучше сразу позвонить и уточнить свободный пост.</p>
                    <a href="tel:<?= h($business['phoneHref']); ?>">Позвонить мастеру</a>
                </article>
                <article class="intent-card">
                    <span class="intent-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
                    </span>
                    <h3>Плановое ТО</h3>
                    <p>Масло, фильтры, жидкости, свечи, диагностика перед поездкой или покупкой автомобиля.</p>
                    <button type="button" data-service-select="Плановое ТО автомобиля">Выбрать ТО</button>
                </article>
                <article class="intent-card">
                    <span class="intent-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M4 15h16l-2-6H6l-2 6Zm3 0v3m10-3v3M8 9l1-3h6l1 3"/></svg>
                    </span>
                    <h3>Кузов и покраска</h3>
                    <p>Вмятины, бампер, пороги, локальная покраска, деталь или полный окрас.</p>
                    <button type="button" data-service-select="Кузовной ремонт">Описать повреждение</button>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="services" aria-labelledby="services-title">
        <div class="container">
            <div class="section-heading split-heading">
                <div>
                    <p class="eyebrow">Услуги без перегруза</p>
                    <h2 id="services-title">Популярные обращения вынесены в один экран</h2>
                </div>
                <p>Полный список ниже остается доступен через поиск и категории, но первыми показаны услуги, которые чаще всего нужны быстро.</p>
            </div>
            <div class="popular-grid">
                <?php foreach ($primaryServices as [$serviceName, $slug]): ?>
                    <?php
                    $group = array_values(array_filter($serviceGroups, static fn(array $item): bool => $item['slug'] === $slug))[0];
                    $matched = array_values(array_filter($group['items'], static fn(array $item): bool => $item[0] === $serviceName))[0] ?? null;
                    $price = $matched ? $matched[1] : minPrice($group['items']);
                    ?>
                    <article class="service-tile">
                        <span><?= h($group['title']); ?></span>
                        <h3><?= h($serviceName); ?></h3>
                        <p><?= h($group['need']); ?></p>
                        <div class="tile-bottom">
                            <strong>от <?= h(rub($price)); ?></strong>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="industrial-showcase" aria-label="Фотографии направлений сервиса">
                <article class="showcase-card showcase-large">
                    <img src="assets/diagnostics-industrial.png" alt="Компьютерная диагностика автомобиля в сервисном боксе" loading="lazy">
                    <div>
                        <span>Диагностика до ремонта</span>
                        <h3>Сначала причина, потом смета</h3>
                        <p>Для двигателя, электрики, подвески, тормозов и коробки. Это снижает риск лишних замен и неожиданных работ.</p>
                    </div>
                </article>
                <article class="showcase-card">
                    <img src="assets/body-paint-industrial.png" alt="Подготовка кузова автомобиля к покраске" loading="lazy">
                    <div>
                        <span>Кузов и покраска</span>
                        <h3>Вмятины, бамперы, детали</h3>
                    </div>
                </article>
                <article class="showcase-card">
                    <img src="assets/roadside-service-industrial.png" alt="Автосервисный бокс у трассы с автомобилем на подъемнике" loading="lazy">
                    <div>
                        <span>Сервис у трассы</span>
                        <h3>Быстрый заезд с М-4</h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section-muted" id="trust" aria-labelledby="trust-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Как снижаем риск переплаты</p>
                <h2 id="trust-title">Понятный порядок работ до того, как машина заехала в ремонт</h2>
                <p>Это главный UX-блок для клиента, который боится лишних замен и неожиданного чека.</p>
            </div>
            <div class="process-grid">
                <article class="process-step">
                    <span>1</span>
                    <h3>Сначала симптом</h3>
                    <p>В заявке или по телефону опишите, что произошло: звук, ошибка, перегрев, удар, течь или плановое ТО.</p>
                </article>
                <article class="process-step">
                    <span>2</span>
                    <h3>Диагностика от 500 ₽</h3>
                    <p>Если причина неочевидна, начинайте с диагностики. Комплексная диагностика в прайсе указана от 1 500 ₽.</p>
                </article>
                <article class="process-step">
                    <span>3</span>
                    <h3>Согласование цены</h3>
                    <p>До ремонта уточните список работ, цену работ, необходимость запчастей и что будет согласовываться отдельно.</p>
                </article>
                <article class="process-step">
                    <span>4</span>
                    <h3>Ремонт и гарантия</h3>
                    <p>В карточке бизнеса указана гарантия. Условия лучше зафиксировать при приемке по конкретной работе.</p>
                </article>
            </div>
            <div class="proof-strip" aria-label="Факты из карточки бизнеса">
                <div>
                    <strong><?= h($business['rating']); ?></strong>
                    <span>рейтинг</span>
                </div>
                <div>
                    <strong><?= h($business['ratingsCount']); ?></strong>
                    <span>оценок</span>
                </div>
                <div>
                    <strong><?= h($business['reviewsCount']); ?></strong>
                    <span>отзывов</span>
                </div>
                <div>
                    <strong>09-21</strong>
                    <span>каждый день</span>
                </div>
            </div>
            <div class="industrial-warning">
                <strong>Важное правило перед приездом</strong>
                <p>Сервис принимает поток с трассы, поэтому для точного времени лучше позвонить заранее. Это честнее, чем обещать мгновенный заезд при любой загрузке.</p>
                <a href="tel:<?= h($business['phoneHref']); ?>">Уточнить свободный пост</a>
            </div>
        </div>
    </section>

    <section class="section" id="price" aria-labelledby="price-title">
        <div class="container">
            <div class="section-heading split-heading">
                <div>
                    <p class="eyebrow">Прайс по категориям</p>
                    <h2 id="price-title">Найдите услугу за несколько секунд</h2>
                </div>
                <p>Цены указаны по входным данным из карточки. Для точного расчета нужны модель, состояние автомобиля и запчасти.</p>
            </div>

            <div class="price-tools" role="search">
                <label for="service-search">Поиск услуги</label>
                <input id="service-search" type="search" placeholder="Например: масло, ГРМ, кондиционер, бампер" data-service-search>
            </div>

            <div class="category-chips" aria-label="Фильтр категорий">
                <button class="chip is-active" type="button" data-category-filter="all">Все</button>
                <?php foreach ($serviceGroups as $group): ?>
                    <button class="chip" type="button" data-category-filter="<?= h($group['slug']); ?>"><?= h($group['title']); ?></button>
                <?php endforeach; ?>
            </div>

            <div class="price-list" data-price-list>
                <?php foreach ($serviceGroups as $group): ?>
                    <details class="price-group" open data-category="<?= h($group['slug']); ?>">
                        <summary>
                            <span>
                                <strong><?= h($group['title']); ?></strong>
                                <small><?= h($group['summary']); ?></small>
                            </span>
                            <span class="price-range">от <?= h(rub(minPrice($group['items']))); ?> до <?= h(rub(maxPrice($group['items']))); ?></span>
                        </summary>
                        <div class="service-rows">
                            <?php foreach ($group['items'] as [$name, $price]): ?>
                                <div class="service-row" data-service-row data-category="<?= h($group['slug']); ?>" data-search="<?= h($name . ' ' . $group['title']); ?>">
                                    <span><?= h($name); ?></span>
                                    <strong>от <?= h(rub((int)$price)); ?></strong>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </details>
                <?php endforeach; ?>
                <p class="empty-state" data-empty-state hidden>Ничего не найдено. Попробуйте другое слово или позвоните мастеру.</p>
            </div>
        </div>
    </section>

    <section class="section section-muted" id="reviews" aria-labelledby="reviews-title">
        <div class="container">
            <div class="section-heading split-heading">
                <div>
                    <p class="eyebrow">Отзывы с Яндекс.Карт</p>
                    <h2 id="reviews-title">Что клиенты уже отмечают в сервисе</h2>
                </div>
                <a class="text-link" href="<?= h($business['mapUrl']); ?>" target="_blank" rel="noopener">Смотреть карточку на Яндекс.Картах</a>
            </div>
            <div class="review-summary">
                <div class="rating-panel">
                    <strong><?= h($business['rating']); ?></strong>
                    <span><?= h($business['ratingsCount']); ?> оценок, <?= h($business['reviewsCount']); ?> отзывов</span>
                </div>
                <div class="review-note">
                    <h3>Честный вывод для лендинга</h3>
                    <p>Положительные отзывы чаще говорят о скорости, помощи в дороге, зоне ожидания, диагностике и адекватных ценах. В части отзывов есть замечания про очереди, стоимость и коммуникацию, поэтому на странице явно вынесены звонок перед приездом и согласование работ.</p>
                </div>
            </div>
            <div class="reviews-grid">
                <?php foreach ($reviews as $review): ?>
                    <figure class="review-card">
                        <blockquote><?= h($review['text']); ?></blockquote>
                        <figcaption>
                            <strong><?= h($review['name']); ?></strong>
                            <span><?= h($review['date']); ?></span>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="comfort-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Удобства на месте</p>
                <h2 id="comfort-title">Что важно, если вы ждете машину или едете по трассе</h2>
            </div>
            <ul class="feature-list">
                <?php foreach ($features as $feature): ?>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
                        <span><?= h($feature); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="section section-accent" id="lead-form" aria-labelledby="form-title">
        <div class="container lead-layout">
            <div class="lead-copy">
                <p class="eyebrow">Запись без лишних полей</p>
                <h2 id="form-title">Оставьте телефон - мастер уточнит свободное время и предварительную стоимость</h2>
                <p>Форма специально короткая для мобильного пользователя. Если ситуация срочная на М-4, звонок быстрее заявки.</p>
                <div class="lead-callout">
                    <strong>Срочно?</strong>
                    <a href="tel:<?= h($business['phoneHref']); ?>"><?= h($business['phone']); ?></a>
                </div>
            </div>

            <form class="lead-form" action="#lead-form" method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= h($_SESSION['csrf_token']); ?>">
                <div class="hidden-field" aria-hidden="true">
                    <label for="company">Компания</label>
                    <input id="company" type="text" name="company" tabindex="-1" autocomplete="off">
                </div>

                <?php if ($formSuccess): ?>
                    <div class="form-message success" role="status">
                        Заявка сохранена. Если вопрос срочный, позвоните прямо сейчас: <?= h($business['phone']); ?>.
                    </div>
                <?php endif; ?>

                <?php if ($formErrors): ?>
                    <div class="form-message error" role="alert">
                        <?php foreach ($formErrors as $error): ?>
                            <p><?= h($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <label for="name">Имя</label>
                <input id="name" name="name" type="text" autocomplete="name" value="<?= h($formValues['name']); ?>" placeholder="Как к вам обращаться">

                <label for="phone">Телефон для связи</label>
                <input id="phone" name="phone" type="tel" autocomplete="tel" required inputmode="tel" value="<?= h($formValues['phone']); ?>" placeholder="+7 999 000-00-00">

                <label for="service">Что нужно сделать</label>
                <select id="service" name="service" data-service-select-target>
                    <option value="">Выберите услугу или опишите ниже</option>
                    <?php foreach ($serviceGroups as $group): ?>
                        <optgroup label="<?= h($group['title']); ?>">
                            <?php foreach ($group['items'] as [$name, $price]): ?>
                                <option value="<?= h($name); ?>" <?= $formValues['service'] === $name ? 'selected' : ''; ?>><?= h($name); ?> - от <?= h(rub((int)$price)); ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>

                <label for="car">Автомобиль</label>
                <input id="car" name="car" type="text" autocomplete="off" value="<?= h($formValues['car']); ?>" placeholder="Марка, модель, год">

                <label for="message">Комментарий</label>
                <textarea id="message" name="message" rows="4" placeholder="Что случилось, когда удобно приехать, нужны ли запчасти"><?= h($formValues['message']); ?></textarea>

                <label class="checkbox-line">
                    <input type="checkbox" name="consent" required>
                    <span>Согласен на обработку данных для обратной связи</span>
                </label>

                <button class="btn btn-primary btn-full" type="submit">Отправить заявку</button>
                <p class="form-footnote">Заявка не подтверждает запись автоматически. Мастер свяжется с вами, уточнит задачу и свободное время.</p>
            </form>
        </div>
    </section>

    <section class="section" aria-labelledby="faq-title">
        <div class="container faq-layout">
            <div class="section-heading">
                <p class="eyebrow">Ответы на частые сомнения</p>
                <h2 id="faq-title">Коротко о цене, записи, гарантии и ожидании</h2>
            </div>
            <div class="faq-list">
                <?php foreach ($faq as $item): ?>
                    <details>
                        <summary><?= h($item['q']); ?></summary>
                        <p><?= h($item['a']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section-dark" id="contacts" aria-labelledby="contacts-title">
        <div class="container contacts-layout">
            <div>
                <p class="eyebrow">Контакты</p>
                <h2 id="contacts-title">Автосервис «Дон» на 33-м километре М-4</h2>
                <address><?= h($business['address']); ?></address>
                <p class="route-note">Если едете по М-4, лучше перестроиться в правый ряд заранее и уточнить заезд по карте.</p>
            </div>
            <div class="contact-panel">
                <a class="contact-phone" href="tel:<?= h($business['phoneHref']); ?>"><?= h($business['phone']); ?></a>
                <span><?= h($business['hoursText']); ?></span>
                <span class="<?= $isOpen ? 'status-open' : 'status-closed'; ?>"><?= h($openStatus); ?></span>
                <div class="contact-actions">
                    <a class="btn btn-primary" href="tel:<?= h($business['phoneHref']); ?>">Позвонить</a>
                    <a class="btn btn-light" href="<?= h($business['mapUrl']); ?>" target="_blank" rel="noopener">Маршрут</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <p>© <?= date('Y'); ?> Автосервис «Дон». Данные для лендинга взяты из переданной карточки Яндекс.Карт.</p>
        <a href="privacy.php">Политика обработки данных</a>
    </div>
</footer>

<div class="mobile-cta" aria-label="Быстрые действия на мобильном">
    <a href="tel:<?= h($business['phoneHref']); ?>">Позвонить</a>
    <a href="#lead-form">Записаться</a>
    <a href="<?= h($business['mapUrl']); ?>" target="_blank" rel="noopener">Карта</a>
</div>

<script src="assets/app.js" defer></script>
</body>
</html>
