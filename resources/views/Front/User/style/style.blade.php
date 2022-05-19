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
        background-image: linear-gradient(to top right, #393938, #F7941D);
        padding: 10px;
        padding-right: 20px;
        padding-left: 20px;
        color: #fff;
        position: relative;
        overflow: hidden;
        cursor: pointer;
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