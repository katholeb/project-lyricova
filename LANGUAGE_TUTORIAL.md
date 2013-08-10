## 多语言翻译教程及规范

#### 1. 添加语言
在application/language里面添加文件夹，遵循国际通用标识。如zh-CN，en-US等。
并在所有文件里面补全必要的php文件。

#### 2. 添加语言文件
每一个语言文件对应一个模块。现在歌语计划共有四个模块，分别为main，user，admin，imggen。（参见application/controllers)

语言文件对应关系如下：

    模块名：        main
    语言文件名：    main_lang.php

    模块名：        user
    语言文件名：    user_lang.php

以此类推。<br>
    __注意：每个语言文件夹都需要有同样的php文件。__
    
追加语言文件后要在 application/config/autoload.php 的 language 行里面追加模块名。
如：

         $autoload['language'] = array('main','user','模块名3','模块名4');

#### 3. 添加语言条目。
在相应的语言文件里面追加行即可。
格式：

    $lang['模块名_条目名'] = "显示文字";

    如：
    $lang['main_login'] = "Log in";

__注意：不同语言中每一个对应的语言文件需要有同样的变量。__

#### 4. 将语言条目加入到显示中。
大部分显示文件保存于application/view中。也有少部分存在于application/controller里面

方法：<br>
将文件里面相应的字串替换为如<?=lang('模块名_条目名');?>的php函数。
    例如：<?=lang('main_login');?>

#### 5. 更改当前语言
在application/config/config.php里面
更改行

    $config['language'] = '语言代号';
    
即可。
例如：

    $config['language'] = 'en-US';

#### 6. 建议操作次序
建议先把所有显示英文字串全部转到语言文件里面，然后复制出一份到中文文件夹，再翻译。

#### TODO（待办事项）

- [ ] view 变量化
- [ ] 翻译字串
- [ ] 翻译系统自带字串


> 蓝色之风<br>
> 20130728<br>
> 深夜赶制版。<br>
> For TsFreddie.