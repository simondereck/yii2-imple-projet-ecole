"use strict";

class rdv {

    initData(){
        this.data = {
            max_year:2030,
            max_month:12,
            min_year:2019,
            min_month:1,
            nex:true,
            pre:false,
            year:new Date().getFullYear(),
            month:new Date().getMonth()+1,
            day:new Date().getDate(),
            calenderTitle:"",
            days:[],
            selected:null,
            flash:true,
            current_year:0,
            current_month:0,
            select_Year:null,
            select_month:null,
            select_day:null,
            $year:null,
            $month:null,
            $day:null,
            $active:null,
            $block:null,
            height:null
        };

    }


    constructor(){
        this.initData();
        var year = this.data.year;
        var month = this.data.month;
        this.data.select_Year = year;
        this.data.select_month = month;
        this.data.select_day = this.data.day;
        // this.data.callback = callback;
    }


    show(){
        // var self = this;
        // let pickTitle = '<div class="picker-title">' +
        //     '</div>';

        alert(1235);

    }
}


