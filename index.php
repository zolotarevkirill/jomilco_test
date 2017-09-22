<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="/build/css/template.css" rel="stylesheet"/>

</head>
<body>
<!-- header -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="#">
                    <img src="/img/logo.jpg" alt=""/>
                </a>
            </div>
            <div class="search">

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
                <li class="line " data-name="Москва - Владивосток" data-output="<?= mktime(12, 45, 0, 9, 12, 2017); ?>"
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
                            <button class="buy" data-item="inner_1">Купить билет</button>
                        </div>

                    </div>
                    <div class="inner" data-inner="inner_1">

                        <div class="train">
                            <ol class="train-list">
                                <?php for($i =1; $i <= 40; $i++):?>

                                    <?php if(rand(1,5) == 1):?>
                                        <?php if($i < 10):?>
                                            <li class="occupied">0<?=$i?></li>
                                        <?php else:?>
                                            <li class="occupied"><?=$i?></li>
                                        <?php endif;?>
                                    <?php else:?>
                                        <?php if($i < 10):?>
                                            <li>0<?=$i?></li>
                                        <?php else:?>
                                            <li><?=$i?></li>
                                        <?php endif;?>
                                    <?php endif;?>


                                <?php endfor; ?>
                            </ol>
                        </div>
                        <div class="display">
                            <p>Вы выбрали</p>
                            <span>18, 20 места</span>
                        </div>

                    </div>
                </li>


            </ul>

        </div>
    </main>
    <footer>

    </footer>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/template.js"></script>
</body>
</html>