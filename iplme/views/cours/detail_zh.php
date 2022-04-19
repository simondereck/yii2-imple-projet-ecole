<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 12:59
 */

?>

<div class="detail">
    <div class="breadcrumb">
        <label>
            <a>cours en ligne</a></label>
        <label>/</label>
        <label>détail</label>
    </div>

    <div class="cours-detail">
        <div class="cours-detail-img"><img src="<?php echo $model->image;?>"/></div>
        <div class="cours-detail-right">
            <div class="cours-detail-name">
                <?php echo ArrayDatas::getFaculty()[$model->faculty]; ?>
            </div>
            <div class="cours-detail-info">
                <div class="cours-detail-use">2.9 万人学过</div>
                <div class="cours-detail-stars">✨✨✨✨</div>
            </div>
            <div class="cours-detail-fee">
                免费
            </div>
            <div class="cours-detail-button-group">
                <button>Demander en ligne</button>
            </div>
        </div>
    </div>

    <div class="cours-description">
        <div class="cours-description-title">详情</div>
        <div class="cours-description-detail">
            <?php echo $model->description;?>
        </div>
        <div class="cours-detail-list">
            <?php
            if ($items){
                foreach ($items as $key => $item){
                    ?>
                    <div class="cours-detail-list-item">
                        <span class="glyphicon glyphicon-book"></span>
                        <text><?php echo $item->name;?></text>
                        <text><?php echo $item->ctime;?></text>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    $('.cours-detail-button-group').on('click','button',function () {
        alert('demache');
    });
    $('.breadcrumb').on('click','a',function () {
        window.location = 'index.php?r=cours/index';
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .detail{
        width: 60vw;
        margin: 20px auto 20px;
    }

    .breadcrumb{
        background-color: white;
    }

    .cours-detail, .cours-description{
        background-color: white;
        margin-bottom: 10px;
        padding: 10px;
    }

    .cours-detail{
        display: flex;
    }

    .cours-detail-img,.cours-detail-img img{
        width: 250px;
        height: 200px;
    }

    .cours-detail-img img{
        object-fit: cover;
    }


    .cours-detail-right{
        margin-left: 10px;
    }

    .cours-detail-right div{
        margin-bottom: 10px;
    }

    .cours-detail-info{
        display: flex;
        color: grey;
        font-size: 10px;
    }
    .cours-detail-info *{
        margin-right: 10px;
    }

    .cours-detail-name,.cours-detail-fee{
        font-size: 20px;
        font-weight: bold;
    }

    .cours-detail-button-group button{
        background-color: orangered;
        color: white;
        border: none;
        padding: 10px;
    }

    .cours-detail-button-group button:hover{
        background-color: orange;
    }

    .cours-description-title{
        width: fit-content;
        padding: 5px;
        background-color: #122b40;
        color: white;
        border-radius: 2px;

    }

    .cours-description-detail{
        margin-top: 10px;
    }

    .cours-detail-list{
        margin-top: 1vw;
        padding: 1vw;
        background-color: whitesmoke;
    }

    .cours-detail-list-item{
        display: flex;
        justify-content: space-between;
        padding: 5px;
        background-color: white;
        margin-bottom: 5px;
    }

    .cours-detail-list-item:hover{
        box-shadow: 0px 5px 3px rgba(0,0,0,0.2);
        background-color: #1b6d85;
        color: white;
    }

</style>
