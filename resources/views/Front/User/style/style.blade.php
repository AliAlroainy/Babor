<style>
    @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@100;400&display=swap');

    * {
        margin: 0;
        padding: 0;
    }


    

    .cardp {
        height: 220px;
        width: 100%;
        border-radius: 10px;
        background-image:   linear-gradient(to top right, #393938, #F7941D) ;
        /* url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1000' height='1000' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23444444' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23553B17'%3E%3Ccircle cx='769' cy='229' r='8'/%3E%3Ccircle cx='539' cy='269' r='8'/%3E%3Ccircle cx='603' cy='493' r='8'/%3E%3Ccircle cx='731' cy='737' r='8'/%3E%3Ccircle cx='520' cy='660' r='8'/%3E%3Ccircle cx='309' cy='538' r='8'/%3E%3Ccircle cx='295' cy='764' r='8'/%3E%3Ccircle cx='40' cy='599' r='8'/%3E%3Ccircle cx='102' cy='382' r='8'/%3E%3Ccircle cx='127' cy='80' r='8'/%3E%3Ccircle cx='370' cy='105' r='8'/%3E%3Ccircle cx='578' cy='42' r='8'/%3E%3Ccircle cx='237' cy='261' r='8'/%3E%3Ccircle cx='390' cy='382' r='8'/%3E%3C/g%3E%3C/svg%3E") ,   */
        padding: 10px;
        padding-right: 20px;
        padding-left: 20px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .cardp .line-1 {
        height: 200px;
        width: 200px;
        display: flex;
        clip-path: polygon(50% 0%, 15% 100%, 78% 100%);
        opacity: 0.6;
        background: #1e45b3;
        position: absolute;
        bottom: 90px;
        right: -30px;
        transform: rotate(45deg);
        animation: anim 3s infinite;


    }

    .cardp .line-2 {
        height: 300px;
        width: 300px;
        display: flex;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        opacity: 0.4;
        background: #1e45b3;
        position: absolute;
        top: -30px;
        right: -30px;
        transform: rotate(70deg);
        animation: anim 3s infinite;
        animation-delay: 2s;
    }

    .cardp .line-3 {
        height: 200px;
        width: 200px;
        display: flex;
        clip-path: polygon(100% 0, 0 55%, 78% 100%);
        opacity: 0.3;
        background: #1e45b3;
        position: absolute;
        top: -30px;
        right: -30px;
        transform: rotate(70deg);
        animation: anim 3s infinite;
        animation-delay: 4s;
    }

    @keyframes anim {
        from {
            opacity: 0.3;
            transform: rotate(0deg);

        }

        to {
            opacity: 0.8;
            transform: rotate(180deg);

        }
    }



    .visa h4 {
        font-size: 40px;
        font-family: 'Rokkitt', serif;

    }

    .visa span {
        margin-left: 2px;
        font-family: 'Rokkitt', serif;
    }

    .visa img {
        width: 50px;
    }

    .cardp .visa i {
        font-size: 50px;

    }

    .tick {
        height: 25px;
        width: 25px;
        background-color: #7587c5;
        border-radius: 7px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        margin-top: 6px;
    }

    .tick i {
        transition: all 1s;
    }

    .cardp:hover .tick i {

        transform: rotate(360deg);
    }

    .top-row {
        display: flex;
        justify-content: space-between;

        position: relative;

    }

    .bottom-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        position: absolute;
        bottom: 20px;

    }

    .bottom-row .dots {
        display: flex;
        flex-direction: row;
        margin-right: 7px;
    }

    .bottom-row .dots span {
        height: 6px;
        width: 6px;
        background-color: #fff;
        border-radius: 50%;
        margin: 0 2px;
    }

    .bottom-row .number {
        font-size: 20px;
        font-weight: 600;
    }


    .box-right {
        padding: 30px 25px;
        background-color: white;
        border-radius: 10px;
        margin-left: 6px;
    }

    .box-left {
        padding: 20px 20px;
        background-color: white;
        border-radius: 10px
    }

    .textmuted {
        color: #7a7a7a
    }

    .bg-green {
        background-color: #d4f8f2;
        color: #06e67a;
        padding: 3px 0;
        display: inline;
        border-radius: 25px;
        font-size: 11px
    }

    .p-blue {
        font-size: 14px;
        color: #1976d2
    }

    .fas.fa-circle {
        font-size: 12px
    }

    .p-org {
        font-size: 14px;
        color: #fbc02d
    }

    .h7 {
        font-size: 15px
    }

    .h8 {
        font-size: 12px
    }

    .h9 {
        font-size: 10px
    }

    .bg-blue {
        background-color: #dfe9fc9c;
        border-radius: 5px
    }



    .far.fa-credit-card {
        position: absolute;
        top: 10px;
        padding: 0 15px
    }

    .fas,
    .far {
        cursor: pointer
    }

    .cursor {
        cursor: pointer
    }

    .btn.btn-primary {
        box-shadow: none;
        height: 40px;
        padding: 11px
    }

    .bg.btn.btn-primary {
        background-color: transparent;
        border: none;
        color: #1976d2
    }

    .bg.btn.btn-primary:hover {
        color: #539ee9
    }
    /* @media(max-width:320px) {
        .h8 {
            font-size: 11px
        }

        .h7 {
            font-size: 13px
        }

        ::placeholder {
            font-size: 10px
        }
    }  */

</style>