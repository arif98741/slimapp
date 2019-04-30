## Slim APP For Test

Slim Framework is a popular rest api framework tool that is used for making api. It provides easy to use api documentation, route features and so on. Anyone can easily make api by using <strong>Slim Framework</strong>. 
<br>
This is a practice repository for making api by using slim. You can use this as a reference for your site. Here vendor folder is not present. 
<br>
For using this in your website just download it. Then put the whole folder in htdocs folder. Then open terminal/cmd. Go to directory and simply use command <br><br>
<strong>composer update</strong><br><br> (be sure that you have installed composer). Then make a database in your local machine. Import the .sql file from database forlder. Change connection sittings if required from <strong>src/config/db.php</strong>.

<br><br>
Finally your slimapp will be ready to execute. Change as your own wise. This repository doesn't provide security features. Its just for practice and reference. Be sure to have attention in security for all the time. 


## api pattern for Customer
public/api <br>
public/api/customers <br>
public/api/customer/{id} <br>
public/api/customer/add <br>
public/api/customer/update/{id} <br>
public/api/customer/delete/{id}<br>


## api pattern for Book
public/api/book <br>
public/api/book/{id} <br>
public/api/book/query/{search_query} <br>
public/api/book/publisher/{publisher} <br>
public/api/book/delete/{id}


