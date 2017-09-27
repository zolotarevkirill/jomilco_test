<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="/build/css/template.css" rel="stylesheet"/>

</head>
<body>
<!-- header -->
<header>
    <div class="container">
        <div class="wrapper_header">
            <div class="logo">
                <a href="#">
                    <img src="/img/logo.jpg" alt=""/>
                </a>
            </div>
            <form action="#" method="#">
            <div class="search">

                    <div id="myInput" class="customselect">
                        <button class="title">Выберите <span></span></button>
                        <ul>
                            <li data-value="t0">TEST0</li>
                            <li data-value="t1">TEST1</li>
                            <li data-value="t2">TEST2</li>
                        </ul>
                    </div>

                    <div id="myInput2" class="customselect">
                        <button class="title">Выберите <span></span></button>
                        <ul>
                            <li data-value="test0">T0</li>
                            <li data-value="test1">T1</li>
                            <li data-value="test2">T2</li>
                        </ul>
                    </div>


                    <input type="text" id="datepicker" value="  Куда">

                    <input type="submit" value="Найти" class="searchBtn">

            </div>
            </form>
        </div>

    </div>
</header>
<main>
    <div class="container">
        <ul class="sort-list">
            <li class="sort" data-sort-f="Name">
                Поезд
            </li>
            <li>
                № Пути
            </li>
            <li class="sort" data-sort-f="DateOutput">
                Отправление
            </li>
            <li class="sort" data-sort-f="DateInput">
                Прибытие
            </li>
            <li>
                Свободные места
            </li>
        </ul>


        <ul class="list">
            <li class="line " data-l="line_1" data-name="Москва - Владивосток"
                data-output="<?= mktime(12, 45, 0, 9, 12, 2017); ?>"
                data-input="<?= mktime(3, 17, 0, 10, 10, 2017); ?>">

                <div class="item">
                    <div class="number">100э</div>
                    <div class="name">
                        Москва - Владивосток
                        <span>поезд, РЖД/ФПК</span>
                    </div>
                    <div class="count">
                        3
                    </div>
                    <div class="output">
                        12:45, 12 сентября
                    </div>
                    <div class="input">
                        3:17, 10 октября
                    </div>
                    <div class="mesto">
                        24 места
                    </div>
                    <div class="btn">
                        <button class="buy" data-line="line_1" data-item="inner_1">Купить билет</button>
                    </div>

                </div>
                <div class="inner" data-inner="inner_1">
                    <div class="train">
                        <ol class="train-list">
                            <?php for ($i = 1; $i <= 40; $i++): ?>

                                <?php if (rand(1, 5) == 1): ?>
                                    <?php if ($i < 10): ?>
                                        <li class="occupied">0<?= $i ?></li>
                                    <?php else: ?>
                                        <li class="occupied"><?= $i ?></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($i < 10): ?>
                                        <li data-display="disp1">0<?= $i ?></li>
                                    <?php else: ?>
                                        <li data-display="disp1"><?= $i ?></li>
                                    <?php endif; ?>
                                <?php endif; ?>


                            <?php endfor; ?>
                        </ol>
                        <div class="display" data-disp="disp1">
                            <p>Вы выбрали</p>
                            <span data-d="disp1">18, 20 места</span>
                        </div>
                    </div>
                    <form action="#" method="#">
                    <div class="order">

                            <div class="myColumn">
                                <div class="formWrapper">
                                    <input type="text" name="phone" placeholder="Телефон">
                                    <input type="text" name="email" placeholder="E-mail">
                                </div>
                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Фамилия">
                                    <input type="text" name="name" placeholder="Имя">
                                    <input type="text" name="name" placeholder="Отчество">
                                </div>

                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Гражданство">
                                    <input type="text" name="name" placeholder="Серия № документа">
                                    <input type="text" name="name" placeholder="Действует до">
                                </div>
                            </div>
                            <div class="myColumn">
                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Дата рождения">
                                    <div class="myRadio">М</div>
                                    <div class="myRadio">Ж</div>
                                </div>
                            </div>



                    </div>
<!--                        <button>Забронировать</button>-->
                    </form>
                </div>
            </li>


            <li class="line " data-l="line_2" data- data-name="Самара - Питер"
                data-output="<?= mktime(12, 00, 0, 10, 12, 2017); ?>"
                data-input="<?= mktime(5, 30, 0, 10, 20, 2017); ?>">

                <div class="item">
                    <div class="number">200</div>
                    <div class="name">
                        Самара - Питер
                        <span>поезд, Ласточка</span>
                    </div>
                    <div class="count">
                        3
                    </div>
                    <div class="output">
                        12:00, 12 октября
                    </div>
                    <div class="input">
                        5:30, 20 октября
                    </div>
                    <div class="mesto">
                        24 места
                    </div>
                    <div class="btn">
                        <button class="buy" data-line="line_2" data-item="inner_2">Купить билет</button>
                    </div>

                </div>
                <div class="inner" data-inner="inner_2">

                    <div class="train">
                        <ol class="train-list">
                            <?php for ($i = 1; $i <= 40; $i++): ?>

                                <?php if (rand(1, 5) == 1): ?>
                                    <?php if ($i < 10): ?>
                                        <li class="occupied">0<?= $i ?></li>
                                    <?php else: ?>
                                        <li class="occupied"><?= $i ?></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($i < 10): ?>
                                        <li data-display="disp2">0<?= $i ?></li>
                                    <?php else: ?>
                                        <li data-display="disp2"><?= $i ?></li>
                                    <?php endif; ?>
                                <?php endif; ?>


                            <?php endfor; ?>
                        </ol>
                        <div class="display" data-disp="disp2">
                            <p>Вы выбрали</p>
                            <span data-d="disp2">18, 20 места</span>
                        </div>
                    </div>


                    <form action="#" method="#">
                        <div class="order">

                            <div class="myColumn">
                                <div class="formWrapper">
                                    <input type="text" name="phone" placeholder="Телефон">
                                    <input type="text" name="email" placeholder="E-mail">
                                </div>
                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Фамилия">
                                    <input type="text" name="name" placeholder="Имя">
                                    <input type="text" name="name" placeholder="Отчество">
                                </div>

                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Гражданство">
                                    <input type="text" name="name" placeholder="Серия № документа">
                                    <input type="text" name="name" placeholder="Действует до">
                                </div>
                            </div>
                            <div class="myColumn">
                                <div class="formWrapper">
                                    <input type="text" name="fname" placeholder="Дата рождения">
                                    <div class="myRadio">М</div>
                                    <div class="myRadio">Ж</div>
                                </div>
                            </div>



                        </div>
                                                <button class="formBtn">Забронировать</button>
                    </form>

                </div>
            </li>


        </ul>

    </div>
</main>
<footer>

</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/build/js/template.js"></script>
</body>
</html>