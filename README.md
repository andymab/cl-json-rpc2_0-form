# Общее описание:
  https://github.com/andymab/cl-json-rpc2_0-form.git является клиентом https://github.com/andymab/srv-json-rpc2_0-form.git

  его задачей является.
- Получение полей формы по его form_uid и отображении его на странице сайта.
- Отправка заполненных данных формы через api на сервис srv-json-rpc2_0-form для сохранения этих данных там в базу .
- Получение сохраненных данных формы с сервиса srv-json-rpc2_0-form по form_uid, для дальнейшего отображения на отдельной странице сайта. 

# Установка
Должно быть установлено:
- php ^7.4
- Mysql ^8 //только для users
- composer,nodejs,npm

инсталяция:
- git clone https://github.com/andymab/cl-json-rpc2_0-form.git you-app
- cd you-app
- composer all
- npm install && npm run dev
- cp .env.example .env
- В .env установить базу данных, пароль, логин, MAIL_MAILER=log
- php artisan migrate --seed
- php artisan key:generate
- php artisan serve
# Пароли
*login: admin@localhost password: admin*

# Сущности
Users | Пользователи
--- |---
id|Уникальный идентификатор
name | string
email |Уникальный идентификатор
email_verified_at| верификация дата
password| hash
created_at | Время создания
updated_at | Время обновленя

# Контроллеры
FormController | Обработка форм (Основной REST контроллер)
---|---
index| GET/HEAD показ всех форм с сервера 
create| GET/HEAD создание пустой новой формы полученной с сервера
store| POST отправка заполненной формы
show|  GET/HEAD показ полученной заполненой формы с сервера
edit|  GET/HEAD редактирование полученной заполненой формы с сервера
update| PUT/PATCH обновление отредактированной формы
destroy| DELETE удаление заполненой формы


# Пути развития
Использование Survejs для полномаштабного создания и редактирования форм