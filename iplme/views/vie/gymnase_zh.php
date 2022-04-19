<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 03/12/2019
 * Time: 20:24
 */
?>
<div class="gymnase">
    <div class="top-bar-img">
        <img src="../../images/programe/gym_top_bar.jpg" />
        <div>健身项目</div>
    </div>
    <div class="gymnase-description">
        <p>
            Forest Hill 拥有多家强大的健身俱乐部和水上乐园Aquaboulevard。健身房可以健身，可以上课，
            有很多课程呢，拳击，舞蹈，单车，水里运动等等。水上乐园： 可以冲浪，室内外温泉，还有跳水。
        </p>
        <p>
            Forest Hill是一所全球连锁的健身中心，拥有室外运动、肌肉锻炼、健美、放松运动等各项全面的服务。
        </p>
        <p>
            Aquaboulevard是一家大型水上公园，有美丽的热带环境，室内温度非常舒适，常年29℃。
            在这里，您可以享受室内外游泳池、水上滑梯、沙滩、草地。设施干净卫生，服务极其周到。
        </p>
        <p>
            <a class="foresthill" data-href="../../images/pdf/foresthill.pdf">
                申请表点击下载
                <img src="../../images/iplme/download.jpg" />
            </a>
        </p>
        <h3>Liste des clubs :</h3>
        <ul>
            <li>Aquaboulevard de Paris : 4 rue Louis Armand, 75015 Paris</li>
            <li>Forest Hill Versailles : 11 rue Exelmans, 78000 Versailles</li>
            <li>Forest Hill Nanterre City Form : 85 avenue François Arago, 92000 Nanterre</li>
            <li>Forest Hill Nanterre La Défense : 9 à 19 avenue de la liberté, 92000 Nanterre</li>
            <li>Forest Hill Meudon La Forêt : 40 avenue du Maréchal de Lattre de Tassigny, 92360 Meudon</li>
            <li>Forest Hill Aubervilliers : 111 avenue Victor Hugo, 93300 Aubervilliers</li>
            <li>Forest Hill Villejuif Timing : 116 rue Edouard Vaillant, 94807 Villejuif</li>
            <li>Forest Hill La Marche : 1 bis boulevard de la République, 92430 Marne la Coquette</li>
        </ul>
    </div>
</div>
<script>
    $('.gymnase-description').on('click','.foresthill',function () {
            let href = $(this).attr('data-href');
            window.open(href);
    });
</script>
<style>
    body{
        background-color: whitesmoke;
    }
    .gymnase{
        width: 60%;
        background-color: white;
        margin: 20px auto 20px;
        font-size: 1vw;
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

    img{
        object-fit: cover;
    }

    .gymnase-description{
        padding: 2vw;
    }

    .gymnase-description h3{
        font-size:2vw;
        font-weight: bold;
    }

    .gymnase-description a:hover{
        cursor: pointer;
    }

    .foresthill img{
        width: 3vw;
        height: 3vw;
    }
</style>
