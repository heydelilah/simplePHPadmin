### var_dump($conn);
resource(5) of type (mysql link)

### if..else
    <?php if (condition): ?>
    html code to run if condition is true
    <?php else: ?>
    html code to run if condition is false
    <?php endif ?>

### header
header('Location: http://www.example.com/');

### preg_replace_callback 匹配正则
一 一替换内容

$file = file_get_contents('./people.txt', FILE_USE_INCLUDE_PATH);

匹配以{include开头，}结尾

### 区分$conn->query($query)和 mysql_query($query)
要看$conn 是否是通过 new出来的。
前者是new PDO(....)
后者是直接mysql_connect()

### html上传文件- type="file"
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="Submit">
    </form>

### explode(separator,string,limi)
把字符串分割为数组;

### end()
将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）。

### move_uploaded_file(file,newloc)
将上传的文件移动到新位置。 若成功，则返回 true，否则返回 false。
仅用于通过 HTTP POST 上传的文件;
如果目标文件已经存在，将会被覆盖。

### 去掉字符串最後一個字符
$str = substr($str,0,-1);

### Where 子句
SELECT column FROM table WHERE column operator value

### defined('NO_CONNECT') 判断某常量是否被定义
先定义常量
no_connect 就不连接

### mysql_num_rows ( $result );
计算返回的数量 Get number of rows in result

### php优化
不要使用过多的require；尽量合并起来。

### 不能依赖$_FILES["file"]["type"]做判断，直接用$_FILES["file"]["name"]的最后后缀名来判断

### kindeditor

### ceil
如果有小数部分则进一位

### GET和POST
get :是在url上的
post： 是表单且method为post
GET是HTTP中最原始的请求方式，在网页中点击一个超级链接或在地址栏输入一个URL都会发送一个GET请求。在GET请求中，数据是后缀在URL后面来发送的，
阅读：[http://www.phpboke.com/get-post.html]

### 下拉框<select><option></option></select>
用.change事件
用click是没用的
原生：循环，查看‘checked’属性
Jquery: 直接用val()获取选择的值
