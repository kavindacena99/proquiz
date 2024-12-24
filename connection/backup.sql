create database proquiz;
use proquiz;

create table users(userid INT primary key auto_increment,fname varchar(255),lname varchar(255),mail varchar(255),pswd varchar(255));
alter table users add marks double default 0;

create table quizzes(qid INT primary key auto_increment,question text,options text,correct_option INT,category varchar(50),qlang varchar(25));
alter table quizzes add createdby INT default 0;

create table quizpool(qpid INT primary key auto_increment,question text,options text,correct_option INT,category varchar(50),qlang varchar(25),approved INT);

insert into quizzes (question,options,correct_option,category,qlang) values('What is the best programming language?','python,pascal,perl,php',2,'Normal','pascal');
insert into quizzes (question,options,correct_option,category,qlang) values('What is the best data science language?','python,pascal,perl,php',4,'Normal','python');





INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
-- HTML
('Which tag is used to define an unordered list in HTML?', '<ul>,<ol>,<li>,<list>', 1, 'wb', 'normal'),
('What does the <meta> tag in HTML do?', 'Defines metadata,Adds a hyperlink,Includes scripts,Styles elements', 1, 'wb', 'normal'),
('Which attribute is used to define inline CSS in HTML?', 'class,style,id,css', 2, 'wb', 'normal'),
('What is the default display property of a <div> element in HTML?', 'block,inline,inline-block,none', 1, 'wb', 'normal'),
('Which tag is used to create a hyperlink in HTML?', '<a>,<link>,<hyperlink>,<href>', 1, 'wb', 'normal'),

-- CSS
('What is the correct syntax to apply a background color in CSS?', 'background: red;,color: red;,bgcolor: red;,style: red;', 1, 'wb', 'normal'),
('Which property is used to change the text color in CSS?', 'font-color,text-color,color,style', 3, 'wb', 'normal'),
('What is the CSS property to make an element center-aligned?', 'text-align:center,align:center,margin:auto,position:center', 1, 'wb', 'normal'),
('Which CSS selector is used to select elements by their ID?', '#id,.id,*id,id:', 1, 'wb', 'normal'),
('How do you include an external CSS file in HTML?', '<link rel="stylesheet" href="style.css">,<style src="style.css">,<css="style.css">,<include="style.css">', 1, 'wb', 'normal'),

-- JS
('Which function is used to print to the browser console in JavaScript?', 'print(),console.log(),alert(),log()', 2, 'wb', 'js'),
('What is the correct syntax to declare a variable in JavaScript?', 'var x,let x,constant x,int x', 1, 'wb', 'js'),
('Which method is used to add an element at the end of an array in JavaScript?', 'push(),append(),add(),insert()', 1, 'wb', 'js'),
('What is the output of "5" + 2 in JavaScript?', '7,"52",52,Error', 2, 'wb', 'js'),
('How do you check the type of a variable in JavaScript?', 'typeof(variable),checkType(variable),variable.type,isType(variable)', 1, 'wb', 'js'),

-- PHP
('Which function is used to connect to a MySQL database in PHP?', 'mysqli_connect(),mysql(),connect_mysql(),db_connect()', 1, 'wb', 'php'),
('What does PHP stand for?', 'Preprocessed Hypertext Page,PHP Hypertext Processor,Personal Home Page,Processor Hypertext PHP', 3, 'wb', 'php'),
('Which symbol is used to start a variable in PHP?', '@,$,%,&', 2, 'wb', 'php'),
('Which function is used to include one PHP file into another?', 'include(),require(),import(),both A and B', 4, 'wb', 'php'),
('How do you declare a constant in PHP?', 'const NAME = value,define(NAME, value),let NAME = value,constant NAME = value', 2, 'wb', 'php'),

-- MySQL
('Which command is used to select a database in MySQL?', 'USE dbname,SELECT dbname,SHOW DATABASES,CONNECT dbname', 1, 'wb', 'mysql'),
('What is the correct syntax to create a new table in MySQL?', 'CREATE TABLE table_name (),INSERT TABLE table_name (),ADD TABLE table_name (),NEW TABLE table_name ()', 1, 'wb', 'mysql'),
('Which SQL command is used to retrieve data from a database?', 'SELECT,INSERT,UPDATE,DELETE', 1, 'wb', 'mysql'),
('Which SQL clause is used to filter the result set based on a condition?', 'WHERE,FILTER,GROUP BY,ORDER BY', 1, 'wb', 'mysql'),
('Which keyword is used to sort data in descending order in SQL?', 'SORT DESC,ORDER BY DESC,DESC ORDER,DECREASE', 2, 'wb', 'mysql');



-- 2nd set of questions
-- basics js
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('What is the default value of an uninitialized variable in JavaScript?', 'undefined,null,0,false', 1, 'normal', 'js'),
('Which keyword is used to define a constant in JavaScript?', 'let,var,const,define', 3, 'normal', 'js'),
('What is the result of `typeof null` in JavaScript?', 'object,null,undefined,string', 1, 'normal', 'js'),
('Which operator is used to compare both value and type in JavaScript?', '==,===,!=,!==', 2, 'normal', 'js'),
('Which JavaScript loop will execute at least once?', 'for,while,do...while,none', 3, 'normal', 'js');

-- basics java
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which method is the entry point of a Java application?', 'start(),main(),run(),init()', 2, 'normal', 'java'),
('What is the size of an `int` in Java?', '8 bits,16 bits,32 bits,64 bits', 3, 'normal', 'java'),
('Which keyword is used to inherit a class in Java?', 'extends,implements,inherit,super', 1, 'normal', 'java'),
('Which data type is used to store a single character in Java?', 'string,char,text,byte', 2, 'normal', 'java'),
('What does JVM stand for in Java?', 'Java Virtual Machine,Java Variable Module,Java Version Manager,Java Virtual Memory', 1, 'normal', 'java');

-- basics python
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which function is used to get user input in Python?', 'input(),get(),scanf(),read()', 1, 'normal', 'python'),
('What is the output of `type(3.14)` in Python?', 'int,float,complex,double', 2, 'normal', 'python'),
('Which keyword is used to define a function in Python?', 'func,function,def,lambda', 3, 'normal', 'python'),
('Which data structure is mutable in Python?', 'tuple,string,list,all of these', 3, 'normal', 'python'),
('What is the result of `10 // 3` in Python?', '3.33,3,4,error', 2, 'normal', 'python');

-- basics php
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('What is the output of `echo 5 . 3;` in PHP?', '53,8,Error,35', 1, 'normal', 'php'),
('Which function is used to check if a variable is an array in PHP?', 'is_array(),isarray(),check_array(),array_check()', 1, 'normal', 'php'),
('Which PHP superglobal is used to retrieve form data?', '$_FORM,$_REQUEST,$_POST,$_GET', 2, 'normal', 'php'),
('How do you define a constant in PHP?', 'constant(NAME, value),define(NAME, value),let NAME = value,const NAME = value', 2, 'normal', 'php'),
('Which function is used to terminate script execution in PHP?', 'terminate(),exit(),stop(),break()', 2, 'normal', 'php');

-- basics cpp
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which symbol is used to include libraries in C++?', '#,%,@,none', 1, 'normal', 'cpp'),
('What is the correct syntax to declare a constant variable in C++?', 'const int x = 10;,int const x = 10;,constant int x = 10;,both A and B', 4, 'normal', 'cpp'),
('Which header file is required for input and output in C++?', 'iostream,stdio,stdlib,io.h', 1, 'normal', 'cpp'),
('Which operator is used to access members of a class in C++?', '.->,:,::', 2, 'normal', 'cpp'),
('What is the output of `cout << 5 / 2;` in C++?', '2.5,2,5,error', 2, 'normal', 'cpp');


-- 3rd set of questions
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which OOP principle focuses on restricting access to certain components of an object?', 'Inheritance,Polymorphism,Encapsulation,Abstraction', 3, 'oop', 'normal'),
('What is the main purpose of a constructor in OOP?', 'To create methods,To initialize an object,To destroy an object,To define classes', 2, 'oop', 'normal'),
('Which keyword is used in most languages to inherit a class?', 'super,extends,parent,child', 2, 'oop', 'normal'),
('What is method overloading in OOP?', 'Using the same method name with different signatures,Using different names for similar methods,Overriding a method in a subclass,Deleting a method', 1, 'oop', 'normal'),
('What does "polymorphism" mean in OOP?', 'One class can have multiple forms,A class inherits methods from another,Variables can have different values,A function has only one implementation', 1, 'oop', 'normal'),
('Which of the following supports runtime polymorphism?', 'Overloading,Overriding,Static Binding,Dynamic Binding', 4, 'oop', 'normal'),
('What is the purpose of abstraction in OOP?', 'To hide complexity,To create an object,To initialize variables,To handle exceptions', 1, 'oop', 'normal'),
('Which of the following is true about interfaces in OOP?', 'They allow multiple inheritance,They implement methods directly,They do not support polymorphism,They cannot be inherited', 1, 'oop', 'normal'),
('What is the default access modifier for class members in most OOP languages?', 'private,protected,public,internal', 1, 'oop', 'normal'),
('What is the relationship between a superclass and a subclass called?', 'Association,Composition,Inheritance,Aggregation', 3, 'oop', 'normal');

-- 4th set of questions
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which data structure uses the LIFO principle?', 'Queue,Stack,Linked List,Tree', 2, 'dsa', 'normal'),
('What is the time complexity of searching an element in a balanced binary search tree?', 'O(log n),O(n),O(n^2),O(1)', 1, 'dsa', 'normal'),
('Which algorithm is used to find the shortest path in a graph?', 'Dijkstra’s Algorithm,Binary Search,Depth-First Search,Bubble Sort', 1, 'dsa', 'normal'),
('What is the worst-case time complexity of QuickSort?', 'O(n log n),O(n^2),O(n),O(log n)', 2, 'dsa', 'normal'),
('Which of the following data structures is used for Breadth-First Search (BFS)?', 'Stack,Queue,Array,Graph', 2, 'dsa', 'normal'),
('What is a hash table?', 'A data structure that maps keys to values,A tree with balanced nodes,An unsorted list of data,A sequence of arrays', 1, 'dsa', 'normal'),
('What is a heap data structure primarily used for?', 'Sorting elements,Finding the smallest element quickly,Implementing stacks,Finding the largest element quickly', 4, 'dsa', 'normal'),
('Which sorting algorithm has the best average-case performance?', 'Bubble Sort,QuickSort,Merge Sort,Insertion Sort', 3, 'dsa', 'normal'),
('Which data structure is used to convert an infix expression to a postfix expression?', 'Queue,Stack,Tree,Array', 2, 'dsa', 'normal'),
('Which traversal method is used in binary trees to get elements in sorted order?', 'Pre-order,Post-order,In-order,Level-order', 3, 'dsa', 'normal');


-- 5th set of questions
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('What does the HTTP protocol primarily do?', 'Transfers files securely,Facilitates communication between clients and servers,Encrypts user passwords,Executes server-side scripts', 2, 'wb', 'normal'),
('What is the role of a web server?', 'Handles database queries,Stores front-end code only,Serves client requests and delivers web content,Executes client-side scripts', 3,'wb', 'normal'),
('Which protocol is used to encrypt data between a browser and a server?', 'HTTP,FTP,SSL/TLS,DNS', 3,'wb', 'normal'),
('What is a session in web development?', 'A secure way to transfer data,Temporary storage on the server for a user’s data,An encryption method,A method to link multiple web pages', 2,'wb', 'normal'),
('What is the purpose of an API in web applications?', 'Enables interaction between software components,Secures client data,Improves front-end performance,Executes SQL queries', 1,'wb', 'normal'),
('What does a database do in a web application?', 'Stores and retrieves data,Manages the user interface,Handles HTTP requests,Secures user sessions', 1,'wb', 'normal'),
('What is a cookie used for in a web application?', 'Enhancing website design,Tracking user activities,Encrypting database data,Improving server speed', 2,'wb', 'normal'),
('Which layer of a web application processes business logic?', 'Client-side layer,Database layer,Server-side layer,Network layer', 3,'wb', 'normal'),
('What is the main function of a Content Delivery Network (CDN)?', 'Stores web application files,Increases the speed of data delivery,Handles user authentication,Executes server-side scripts', 2,'wb', 'normal'),
('What happens during a GET request in a web application?', 'Data is retrieved from the server,Data is sent to the server,Files are uploaded,User authentication occurs', 1,'wb', 'normal');


-- 6th set of questions
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which feature of OOP allows a class to inherit properties and behavior from another class?', 'Encapsulation,Inheritance,Polymorphism,Abstraction', 2, 'oop', 'normal'),
('In PHP, which keyword is used to access parent class members?', 'self,parent,this,super', 2, 'oop', 'php'),
('What is the main advantage of encapsulation in OOP?', 'Improves performance,Allows hiding of data,Supports multiple inheritance,Makes code reusable', 2, 'oop', 'php'),
('In Java, which keyword is used to inherit a class?', 'extend,super,import,implements', 1, 'oop', 'java'),
('In Python, what is used to define a constructor method in a class?', 'init(),constructor(),__init__(),self()', 3, 'oop', 'python'),
('Which OOP concept describes the ability of a function or method to behave differently based on the input object?', 'Encapsulation,Inheritance,Polymorphism,Abstraction', 3, 'oop', 'normal'),
('What is an abstract class in OOP?', 'A class that cannot be inherited,Used for storing static variables,A class that cannot be instantiated,Used to implement multiple inheritance', 3, 'oop', 'normal'),
('In PHP, which keyword is used to declare an abstract class?', 'abstract,class,extends,interface', 1, 'oop', 'php'),
('In Java, which keyword is used to refer to the current object?', 'super,static,this,extends', 3, 'oop', 'java'),
('In Python, how can you define a private variable in a class?', 'Use an underscore prefix,Declare with "private",Use the "self" keyword,Declare with "protected"', 1, 'oop', 'python');


-- 7th set of questions
INSERT INTO quizzes (question, options, correct_option, category, qlang) 
VALUES
('Which data structure is most suitable for implementing a stack?', 'Array,Linked List,Queue,Tree', 2, 'dsa', 'normal'),
('In Java, which method is used to add an element to a LinkedList?', 'addFirst(),add(),insert(),put()', 2, 'dsa', 'java'),
('What is the time complexity of accessing an element in an array?', 'O(1),O(log n),O(n),O(n log n)', 1, 'dsa', 'normal'),
('Which sorting algorithm has the best worst-case time complexity?', 'Bubble Sort,Quick Sort,Merge Sort,Selection Sort', 3, 'dsa', 'normal'),
('In Python, how do you append an item to a list?', 'list.append(),list.add(),list.insert(),list.push()', 1, 'dsa', 'python'),
('Which of these is a characteristic of a queue data structure?', 'Follows FIFO order,Follows LIFO order,Allows random access,Supports direct modification', 1, 'dsa', 'normal'),
('What is the time complexity of searching for an element in a hash map?', 'O(1),O(log n),O(n),O(n log n)', 1, 'dsa', 'normal'),
('Which of these is a stable sorting algorithm?', 'Quick Sort,Merge Sort,Selection Sort,Bubble Sort', 4, 'dsa', 'normal'),
('In C++, what data structure is implemented by the STL vector?', 'Stack,Queue,Array,List', 3, 'dsa', 'cpp'),
('What is the time complexity of performing a binary search on a sorted array?', 'O(1),O(log n),O(n),O(n log n)', 2, 'dsa', 'normal');








