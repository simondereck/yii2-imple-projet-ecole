<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 15/12/2019
 * Time: 16:57
 */
?>

<div>
    <div class="nav-tourisme">
        <span data-url="index.php?r=programe/commerce">
            国际贸易
        </span>
        <span data-url="index.php?r=programe/marketing">
            市场营销
        </span>
        <span data-url="index.php?r=programe/logistique">
            国际物流
        </span>
        <span data-url="index.php?r=programe/management">
            奢侈品管理
        </span>
        <span data-url="index.php?r=programe/tourisme">
            酒店与旅游管理
        </span>
        <span data-url="index.php?r=programe/art">
            文化管理
        </span>
        <span data-url="http://www.isiac.fr/">
            电影专业
        </span>
    </div>
</div>

<div class="tourisme">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>旅游与酒店管理</div>
    </div>
    <div class="tourisme-description">
        <p>
            酒店管理专业的目的主要是培养有觉悟、具有扎实的专业基础理论、基本知识和基本技能，知识结构合理、理论和实际结合好，
            能很好地胜任旅游及企事业相关单位和部门的管理和服务工作，综合素质好的旅游管理专业高级专门人才。
        </p>
    </div>

    <div class="tourisme-item">
        <div class="tourisme-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
        <div class="tourisme-item-info">
            <h4>专业课程设置</h4>
            <p>1.	企业经济与微观经济学</p>
            <p>2.	结构和管理制度和流程</p>
            <p>3.	企业法与商法</p>
            <p>4.	市场营销概论</p>
            <h4>实践课</h4>
            <p>1.	旅游政策与法规</p>
            <p>2.	国际旅行社经营管理</p>
            <p>3.	旅游美学</p>
            <p>4.	酒店人力资源管理</p>
            <p>5.	现代饭店服务管理</p>
            <p>6.	旅游规划与开发</p>
            <p>7.	国际旅游市场学</p>
            <h4>专业公共课程</h4>
            <p>1.	国际经济学</p>
            <p>2.	商务英语</p>
            <p>3.	商务法语</p>
            <p>4.	职业生涯规划</p>
        </div>

    </div>
    <div class="tourisme-item">
        <div class="tourisme-item-info">
            <h4>提示</h4>
            <ul>
                <li>对于所有BAC+4/BAC+5的学生，每个学年理论课结束后，必须要完成3至6个月的全职实习</li>
                <li>实习期一般在每年的5月至10月之间</li>
                <li>BAC+4的学生实习结束后要完成一份实习报告</li>
                <li>BAC+5的学生实习结束后要完成一篇论文，并且论文交付后，要完成答辩</li>
            </ul>
            <h4>学年/学期日程表</h4>
            <p>为了更好的满足各界学生的学习需求， 我院每年分春、秋两季入学。</p>
            <ul>
                <li>春季班：每年2月中旬</li>
                <li>秋季班：每年10月中旬</li>
            </ul>
            <h4>教学优势</h4>
            <ul>
                <li>
                    小班授课，每班学生不超过20人
                </li>
                <li>
                    教师均来自高商以及公立大学的名师，教学经验丰富，灵活，耐心，特别适合刚就读大学的外国学生，课件丰富
                </li>
                <li>
                    上课时间灵活，每周2-3天的集中上课，适合打工或参加实习的学生
                </li>
                <li>
                    学校提供实习合同，以便学生多参与社会实践
                </li>
                <li>
                    针对外国学生的法语语言问题，学院特别为学生免费开设法语课程，学生可以在学习专业的同时，提高自已的法语水平
                </li>
            </ul>
        </div>
        <div class="tourisme-item-img">
            <img src="../../images/programe/bda3.jpg" />
        </div>
    </div>


</div>

<script>
    $('.nav-tourisme').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;

    }

    .tourisme{
        margin: 20px auto 20px;
        background-color: white;
        width: 60vw;
        font-size: 1vw;
    }
    .tourisme h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .nav-tourisme{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;
    }

    .nav-tourisme span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-tourisme span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }

    .top-bar-img,.top-bar-img img{
        width: 60vw;
        height: 20vw;
        position: relative;
    }

    .top-bar-img div{
        font-size: 2vw;
        color: white;
        padding: 2vw;
        position: absolute;
        top: 0;
        z-index: 200;
    }

    img {
        object-fit: cover;
    }


    .tourisme-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }



    .tourisme-item{
        display: flex;
    }

    .tourisme-item-info,.tourisme-item-img,.tourisme-item-img img{
        width: 30vw;
    }

    .tourisme-item-info{
        padding: 2vw;
    }

    .tourisme-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }

</style>
