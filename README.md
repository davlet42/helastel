<h1>Тестовое задание для
PHP-разработчика</h1>

<div>9 Feb 2021</div>

<h2>Цель</h2>
<p>Необходимо реализовать справочник с возможностью хранения данных о
пользователе в разных источниках (БД, кэш, json-файл, xlsx-файл). Данные
может вносить только авторизованный пользователь.</p>
<p>А также реализовать публичный api для получения этих данных.</p>
<h3>Что нужно сделать</h3>
<p>
    <ol>
        <li>Реализовать API на языке PHP для :
            <ul>
                <li>сохранения записей в указанный источник данных (только
                для авторизованного пользователя)</li>
                <li>получения всех записей из указанного источника данных.
                Допускается использовать любой фреймворк (или без его
                использования), любую БД, кэш.</li>
            </ul>
        </li>
        <li>Реализовать frontend клиент (VueJs или Nuxt) с формой добавления
            пользователя. Способ авторизации на ваше усмотрение.
            Данные
            пользователя:
            <ul>
            <li>ФИО (уникальное значение),</li>
            <li>email адрес,</li>
            <li>телефон</li>
            </ul>
        </li>
    </ol>
</p>

<strong>Важно! Будет оцениваться прежде всего внутренняя реализация, так
что прежде всего надо уделить внимание качеству кода и используемым
архитектурным решениям.</strong>
