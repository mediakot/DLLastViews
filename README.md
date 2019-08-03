## Установка:
* Скачать `zip`
* Установить через `Extras`

### Использование:
На страницах, которые нужно запоминать написать не кэшируемый вызов без параметров `[!DLLastViews!]`.

Там где нужно выводить список просмотренных документов написать некэшируемы вызов с параметрами. Все параметры, как у `DocLister'а` (кроме `idType`, он жестко задан в сниппете) и добавить параметр `&mode='show'`.

Пример выведет список документов.:

[!DLLastViews?
    &mode=`show`
    &ownerTPL=`@CODE: <ul>[+dl.wrap+]</ul>`
    &tpl=`@CODE: <li><a href="[+url+]>[+title+]</a></li>"`
!]

В свойствах сниппета есть два параметра:
* Время хранения cookie. Задается в секундах, по умолчанию 30 дней
* Сколько документов запоминать. По умолчанию: 5
