<style>
    body,
    html {
        height: 100%;
        width: 100%;
    }

    body,
    div,
    span,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Kanit', sans-serif !important;
    }

    #map_officers_switch {
        position: relative;
        width: 100% !important;
        height: 100% !important;

    }

    #topbar {
        display: none !important;
    }

    header {
        display: none !important;
    }

    footer {
        display: none !important;

    }


    @media screen and (min-width: 1024px) {

        /* CSS สำหรับหน้าจอคอมพิวเตอร์ */
        .video-call {
            outline: .5rem solid #000;
            height: 100%;
            width: 100%;
            padding: 1rem;

        }

        .video-header {
            /* outline: .5rem solid #db2d2e; */
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 1rem;
            background-color: #000;
            width: calc(100% - 30%);
            margin: 0 auto;

        }

        .video-header div img {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
            outline: #000 1px solid;
            display: inline-block;


        }

        .video-user-detail {
            display: inline-block;
            margin-left: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 25rem;
            color: #fff;
        }

        .video-user-detail p {
            margin: 0;
            padding: 0;
            font-weight: bold;

        }

        .btn-location {
            display: none !important;
        }

        .video-detail-box {
            display: flex;
            align-items: center;
        }

        .video-body {
            position: relative;
            width: calc(100% - 30%);
            margin: 0 auto;
        }

        .video-local {
            display: flex;
            margin-top: 1.5rem;
            height: calc(100% - 20%);
            outline: #000 .3rem solid;
            border-radius: 1rem;
            background-color: #ff0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }

        .video-remote {
            width: 8rem;
            height: 8rem;
            background-color: #009e6b;
            outline: #009e6b .3rem solid;
            border-radius: 1rem;
            position: absolute;
            top: 10%;
            right: calc(100% - 95%);
        }

        .video-menu {
            display: flex;
            width: calc(100% - 50%);
            /* outline: #000 1rem solid; */
            border-radius: 1rem;
            position: absolute;
            bottom: 5%;
            left: calc(100% - 75%);
            justify-content: space-around;
        }


        .video-menu button {
            padding: 1rem;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.4);
            color: #fff;
            width: 4rem !important;
            height: 4rem !important;
            font-size: 1.2rem;
        }

        .btn-exit {
            background-color: #db2d2e !important;
            color: #fff !important;
        }



        .divRadio {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
            justify-content: center;
        }

        .detail-sos {
            height: 9rem !important;
        }

        #divLocation,
        #closeBtnForm {
            display: none;
        }
    }

    @media screen and (min-width: 768px) and (max-width: 1023px) {

        /* CSS สำหรับหน้าจอแท็บเล็ต */
        .video-call {
            outline: .5rem solid #000;
            height: 100%;
            width: 100%;
            padding: 1rem;

        }

        .video-header {
            /* outline: .5rem solid #db2d2e; */
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 1rem;
            background-color: #000;
            width: calc(100% - 30%);
            margin: 0 auto;
        }

        .video-header div img {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
            outline: #000 1px solid;
            display: inline-block;


        }

        .video-user-detail {
            display: inline-block;
            margin-left: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 13rem;
            color: #fff;
        }

        .video-user-detail p {
            margin: 0;
            padding: 0;
            font-weight: bold;

        }

        .video-detail-box {
            display: flex;
            align-items: center;
        }

        .video-body {
            position: relative;
            width: calc(100% - 30%);
            margin: 0 auto;
        }

        .video-local {
            display: flex;
            margin-top: 1.5rem;
            height: calc(100% - 20%);
            outline: #000 .3rem solid;
            border-radius: 1rem;
            background-color: #ff0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }

        .video-remote {
            width: 8rem;
            height: 8rem;
            background-color: #009e6b;
            outline: #009e6b .3rem solid;
            border-radius: 1rem;
            position: absolute;
            top: 5%;
            right: calc(100% - 95%);
        }

        .video-menu {
            display: flex;
            width: calc(100% - 40%);
            /* outline: #000 1rem solid; */
            border-radius: 1rem;
            position: absolute;
            bottom: 10%;
            left: calc(100% - 80%);
            justify-content: space-around;
        }


        .video-menu button {
            padding: 1rem;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.4);
            color: #fff;
            width: 4rem !important;
            height: 4rem !important;
            font-size: 1.2rem;
        }

        .btn-exit {
            background-color: #db2d2e !important;
            color: #fff !important;
        }


    }

    @media screen and (max-width: 768px) {
        /* CSS สำหรับหน้าจอมือถือ */

        /* CSS สำหรับหน้าจอคอมพิวเตอร์ */
        .video-call {
            height: 100%;
            width: 100%;
            padding: 1rem;

        }

        .video-header {
            /* outline: .5rem solid #db2d2e; */
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 1rem;
            background-color: #000;
            width: calc(100%);
        }

        .video-header div img {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
            outline: #000 1px solid;
            display: inline-block;
        }

        .video-user-detail {
            display: inline-block;
            margin-left: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100% !important;
            color: #fff;
        }

        .video-user-detail p {
            margin: 0;
            padding: 0;
            font-weight: bold;

        }

        .video-detail-box {
            display: flex;
            align-items: center;
            width: 100% !important;
        }

        .video-body {
            position: relative;
            width: calc(100%);
        }

        .video-local {
            display: flex;
            margin-top: 1.5rem;
            height: calc(100% - 30%);
            outline: #000 .3rem solid;
            border-radius: 1rem;
            width: 100%;
            background-color: #ff0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }

        .video-remote {
            width: 7rem;
            height: 7rem;
            background-color: #009e6b;
            outline: #009e6b .3rem solid;
            border-radius: 1rem;
            position: absolute;
            top: 5%;
            right: calc(100% - 95%);
        }

        .video-menu {
            display: flex;
            width: calc(100%);
            /* outline: #000 1rem solid; */
            border-radius: 1rem;
            position: absolute;
            bottom: -20%;
            justify-content: space-around;
            background-color: #000;
            height: 5rem !important;
            align-items: center;
        }


        .video-menu button {
            padding: .2rem;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.4);
            color: #fff;
            width: 3rem !important;
            height: 3rem !important;
            font-size: 1.2rem;
        }

        .btn-exit {
            background-color: #db2d2e !important;
            color: #fff !important;
        }

        .video-user-location {

            display: none;


            position: absolute;
            top: 1rem;
            background-color: #000;
            right: 1rem;
            width: calc(100% - 73%);
            border-radius: 1rem;
            padding: 1rem;
            color: #fff;
        }

        .video-user-location p {
            font-size: .5rem;
            display: -webkit-box;
            /* กำหนดให้แสดงผลเป็น block-level element */
            -webkit-box-orient: vertical;
            /* กำหนดว่าเนื้อหาจะแสดงผลในทิศทางแนวตั้ง */
            overflow: hidden;
            /* กำหนดให้ข้อความที่เกินหน้าจอถูกตัดทิ้ง */
            -webkit-line-clamp: 2;
            /* กำหนดให้แสดงได้สูงสุด 3 บรรทัด */
            text-overflow: ellipsis;
            /* กำหนดเครื่องหมาย ellipsis เมื่อเกิน 3 บรรทัด */
        }



        .divRadio {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
            justify-content: center;
        }

        .btn-location {
            display: none;
            background-color: #4d4d4d !important;
            color: #fff !important;
            padding: .2rem 1rem !important;
        }

        .btn-location:hover {
            background-color: #fff !important;
            color: #000 !important;
            padding: .2rem 1rem !important;
        }

        #divLocation {
            display: none;
            position: fixed;
            top: 28%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 93%;
            background-color: #fff;
            border-radius: 1rem;
            text-align: center;
            padding: 20px 20px 40px 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            background: #000;
            touch-action: none;
            /* ป้องกันการลาก div แล้วขยับหน้าเว็บ */
            z-index: 99999999;
        }

        #divLocation p,
        #divForm p {
            margin-bottom: .2rem;
            color: #fff;
        }

        #closeBtn,
        #closeBtnForm {
            position: absolute;
            top: .5rem;
            right: .5rem;
        }

        .drag {
            position: absolute;
            width: 50px !important;
            height: 8px !important;
            border-radius: 25px !important;
            background-color: rgba(255, 255, 255, 0.3) !important;
            padding: 0 !important;
            bottom: 5px !important;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .dragForm {
            position: absolute;
            width: 50px !important;
            height: 8px !important;
            border-radius: 25px !important;
            background-color: rgba(255, 255, 255, 0.3) !important;
            padding: 0 !important;
            top: 10px !important;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999999999;
        }

        #divForm {
            display: none;
            position: fixed;
            bottom: -4%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 93%;
            background-color: #fff;
            border-radius: 1rem;
            text-align: center;
            padding: 40px 20px 20px 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            background: #000;
            touch-action: none;
            /* ป้องกันการลาก div แล้วขยับหน้าเว็บ */
            z-index: 999999999;
        }

        #divForm textarea {
            height: 6rem;
        }
    }



    /* * {
        outline: #881212 1px solid;
    } */

    @keyframes move {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
    }

    .btn-submit-officer {
        border-radius: .5rem !important;
        float: right !important;
    }

    .fade-in {
        animation: fadeIn 1s ease 0s 1 normal forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: scale(0.6);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .fade-out {
        animation: fadeOut 1s ease 0s 1 normal forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
            transform: scale(1);
        }

        100% {
            opacity: 0;
            transform: scale(0.6);
        }
    }

   
</style>


@extends('layouts.viicheck')

@section('content')
<section class="video-call">
    <div class="video-header">
        <div class="video-detail-box">
            <img src="{{ asset('/img/stickerline/PNG/1.png') }}" />
            <span class="video-user-detail">
                <p>Teerasak Senarak(MOCKUP)</p>
                <small>081-234-5678(MOCKUP)</small>
            </span>
        </div>
    </div>

    <div class="video-body">
        <div class="video-local"></div>

        <div class="video-remote"></div>



        <div class="video-menu">
            <button class="btn ">
                <i class="fa-duotone fa-microphone"></i>
            </button>

            <button class="btn ">
                <i class="fa-duotone fa-video"></i>
            </button>
            <!-- <button class="btn ">
                <i class="fa-solid fa-chevron-up" id="btnShowForm"></i>
            </button> -->
            <button class="btn btn-exit">
                <i class="fa-solid fa-x"></i>
            </button>
        </div>
    </div>



    <!-- <div class="video-form" id="divForm">

        <button class="dragForm btn"></button>
        <button class="btn text-white" id="closeBtnForm"><i class="fa-solid fa-xmark"></i></button>

        <textarea class="form-control detail-sos" placeholder="กรอกรายละเอียดการขอความช่วยเหลือ"></textarea>
        <div class="divRadio">
            <label class="radio">
                <input type="radio" name="type_sos" class="check" value="สพฉ." onchange="check()">
                <span class="redio-emergency">แพทย์ฉุกเฉิน(สพฉ.)</span>
            </label>

            <label class="radio">
                <input type="radio" name="type_sos" class="check" value="ชาลี" onchange="check()">
                <span class="redio-normal">ทั่วไป(ชาลี)</span>
            </label>

            <label class="radio">
                <input type="radio" name="type_sos" class="check" value="อื่นๆ" onchange="check()">
                <span class="redio-other ">อื่นๆ
                </span>
            </label>

        </div>
        <div class="div-submit">
            <input type="text" class="input-other d-none" placeholder="กรอกรายละเอียด">
            <button class="btn btn-success btn-submit-officer">ยืนยัน</button>
        </div>


    </div> -->


</section>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Get started with video calling</title>
</head>

<body>
	<script type="module" src="/main.js"></script>
	<h2 class="left-align">Get started with video calling</h2>
	<div class="row">
		<div>
			<button type="button" id="join">Join</button>
			<button type="button" id="leave">Leave</button>
		</div>
	</div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<script>
	var options = {
		// Pass your App ID here.
		appId: '03039c40792e46bdbe46c16b1a338303',
		appCertificate: 'cf9986c91db74f16879deead4a34dd03',
		channel: 'ViiCHECK',
		uid: '{{ Auth::user()->id }}',
		// uname: '{{ Auth::user()->name }}',

		token: "007eJxTYLi3q31tz6vVyl9eKam5dc3uPi3V9Nu3TVpO7eKbEw28e7IVGAyMDYwtk00MzC2NUk3MklKSgGSyoVmSYaKxsQVQrutZVkpDICODiYoLCyMDBIL4HAxhmZnOHq7O3gwMACWSIG4=",
	};


	//const channelName = "MithCare" + homeId + user_id_from_room;
	const channelName = "ViiCHECK";
	// document.addEventListener('DOMContentLoaded', (event) => {
	// 	// console.log("START");



	// 	// const url = "{{ url('/') }}/api/video_call";
	// 	// axios.get(url).then((response) => {
	// 	//     // console.log(response['data']);
	// 	//     options['token'] = response['data'];
	// 	//     // setTimeout(() => {

	// 	//         document.getElementById("join").click();
	// 	//     // }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน
	// 	// })
	// 	// .catch((error) => {
	// 	//     console.log("ERROR HERE");
	// 	//     console.log(error);
	// 	//     });

	// 	// startBasicCall();

	// });
	let channelParameters = {
		// A variable to hold a local audio track.
		localAudioTrack: null,
		// A variable to hold a local video track.
		localVideoTrack: null,
		// A variable to hold a remote audio track.
		remoteAudioTrack: null,
		// A variable to hold a remote video track.
		remoteVideoTrack: null,
		// A variable to hold the remote user id.s
		remoteUid: null,
	};
	async function startBasicCall() {
		// Create an instance of the Agora Engine

		const agoraEngine = AgoraRTC.createClient({
			mode: "rtc",
			codec: "vp8"
		});
		// Dynamically create a container in the form of a DIV element to play the remote video track.
		const remotePlayerContainer = document.createElement("div");
		// Dynamically create a container in the form of a DIV element to play the local video track.
		const localPlayerContainer = document.createElement('div');
		// Specify the ID of the DIV container. You can use the uid of the local user.
		localPlayerContainer.id = options.uid;
		// Set the textContent property of the local video container to the local user id.
		localPlayerContainer.textContent = "Local user " + options.uid;
		// Set the local video container size.
		localPlayerContainer.style.width = "640px";
		localPlayerContainer.style.height = "480px";
		localPlayerContainer.style.padding = "15px 5px 5px 5px";
		// Set the remote video container size.
		remotePlayerContainer.style.width = "640px";
		remotePlayerContainer.style.height = "480px";
		remotePlayerContainer.style.padding = "15px 5px 5px 5px";
		// Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
		agoraEngine.on("user-published", async (user, mediaType) => {
			// Subscribe to the remote user when the SDK triggers the "user-published" event.
			await agoraEngine.subscribe(user, mediaType);
			console.log("subscribe success");
			// Subscribe and play the remote video in the container If the remote user publishes a video track.
			if (mediaType == "video") {
				// Retrieve the remote video track.
				channelParameters.remoteVideoTrack = user.videoTrack;
				// Retrieve the remote audio track.
				channelParameters.remoteAudioTrack = user.audioTrack;
				// Save the remote user id for reuse.
				channelParameters.remoteUid = user.uid.toString();
				// Specify the ID of the DIV container. You can use the uid of the remote user.
				remotePlayerContainer.id = user.uid.toString();
				channelParameters.remoteUid = user.uid.toString();
				remotePlayerContainer.textContent = "Remote user " + user.uid.toString();
				// Append the remote container to the page body.
				document.body.append(remotePlayerContainer);
				// Play the remote video track.
				channelParameters.remoteVideoTrack.play(remotePlayerContainer);
			}
			// Subscribe and play the remote audio track If the remote user publishes the audio track only.
			if (mediaType == "audio") {
				// Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
				channelParameters.remoteAudioTrack = user.audioTrack;
				// Play the remote audio track. No need to pass any DOM element.
				channelParameters.remoteAudioTrack.play();
			}
			// Listen for the "user-unpublished" event.
			agoraEngine.on("user-unpublished", user => {
				console.log(user.uid + "has left the channel");
			});
		});
		window.onload = function() {
			// Listen to the Join button click event.
			document.getElementById("join").onclick = async function() {
				// Join a channel.
				await agoraEngine.join(options.appId, options.channel, options.token, options.uid);
				// Create a local audio track from the audio sampled by a microphone.
				channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
				// Create a local video track from the video captured by a camera.
				channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
				// Append the local video container to the page body.
				document.body.append(localPlayerContainer);
				// Publish the local audio and video tracks in the channel.
				await agoraEngine.publish([channelParameters.localAudioTrack, channelParameters.localVideoTrack]);
				// Play the local video track.
				channelParameters.localVideoTrack.play(localPlayerContainer);
				console.log("publish success!");
			}
			// Listen to the Leave button click event.
			document.getElementById('leave').onclick = async function() {
				// Destroy the local audio and video tracks.
				channelParameters.localAudioTrack.close();
				channelParameters.localVideoTrack.close();
				// Remove the containers you created for the local video and remote video.
				removeVideoDiv(remotePlayerContainer.id);
				removeVideoDiv(localPlayerContainer.id);
				// Leave the channel
				await agoraEngine.leave();
				console.log("You left the channel");
				// Refresh the page for reuse
				window.location.reload();
			}
		}
	}
	startBasicCall();
	// Remove the video stream from the container.
	function removeVideoDiv(elementId) {
		console.log("Removing " + elementId + "Div");
		let Div = document.getElementById(elementId);
		if (Div) {
			Div.remove();
		}
	};
</script>






























<script>
    // Find necessary elements
    const videoBody = document.querySelector(".video-body");
    const videoRemote = document.querySelector(".video-remote");

    // Adjust style of video-remote to make it draggable
    videoRemote.style.position = "absolute";
    videoRemote.style.cursor = "move";
    videoRemote.style.transition = "transform 0.3s ease-in-out";

    // Set initial position of videoRemote
    let pos1 = 0,
        pos2 = 0,
        pos3 = 0,
        pos4 = 0;

    // Add event listeners for both mouse and touch events
    videoRemote.addEventListener('mousedown', dragMouseDown);
    videoRemote.addEventListener('touchstart', dragMouseDown);

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();

        // Get initial position
        pos3 = e.clientX || e.touches[0].clientX;
        pos4 = e.clientY || e.touches[0].clientY;

        document.addEventListener('mouseup', closeDragElement);
        document.addEventListener('touchend', closeDragElement);
        document.addEventListener('mousemove', elementDrag);
        document.addEventListener('touchmove', elementDrag);
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();

        // Calculate new position of videoRemote
        pos1 = pos3 - (e.clientX || e.touches[0].clientX);
        pos2 = pos4 - (e.clientY || e.touches[0].clientY);
        pos3 = e.clientX || e.touches[0].clientX;
        pos4 = e.clientY || e.touches[0].clientY;
        videoRemote.style.top = (videoRemote.offsetTop - pos2) + "px";
        videoRemote.style.left = (videoRemote.offsetLeft - pos1) + "px";

        // Add animation
        videoRemote.style.transition = "transform 4s ease-out";
        videoRemote.style.transform = "translate3d(0, 0, 0)";
    }

    function closeDragElement() {
        // Calculate final position of videoRemote
        const videoBodyRect = videoBody.getBoundingClientRect();
        const videoRemoteRect = videoRemote.getBoundingClientRect();
        const videoBodyTop = videoBodyRect.top;
        const videoBodyLeft = videoBodyRect.left;
        const videoBodyRight = videoBodyRect.right;
        const videoBodyBottom = videoBodyRect.bottom;
        const videoRemoteTop = videoRemoteRect.top;
        const videoRemoteLeft = videoRemoteRect.left;
        const videoRemoteRight = videoRemoteRect.right;
        const videoRemoteBottom = videoRemoteRect.bottom;

        const offset = 15; // Distance from edge 5px

        if (videoRemoteRight + offset > videoBodyRight) {
            videoRemote.style.left =
                videoBody.offsetWidth - videoRemote.offsetWidth - offset + "px";
        }

        if (videoRemoteLeft - offset < videoBodyLeft) {
            videoRemote.style.left = offset + "px";
        }

        if (videoRemoteTop - offset < videoBodyTop) {
            videoRemote.style.top = offset + "px";
        }

        if (videoRemoteBottom + offset > videoBodyBottom) {
            videoRemote.style.top =
                videoBody.offsetHeight - videoRemote.offsetHeight - offset + "px";
        }

        // Check if the position of the remote is within the boundaries of the body and move it to the closest edge in the direction it is being dragged
        if (
            (videoRemoteRight <= (videoBodyRight + offset)) &&
            (videoRemoteLeft >= (videoBodyLeft - offset)) &&
            (videoRemoteTop >= (videoBodyTop - offset)) &&
            (videoRemoteBottom <= (videoBodyBottom + offset))
        ) {
            // Check if the remote is on the left or right side of the body and move it to the closest edge in that direction
            if ((videoRemoteLeft - videoBodyLeft) < (videoBodyRight - videoRemoteRight)) {
                // Remote is on left side of body
                // Move remote to left edge of body
                videoRemote.style.left = offset + 'px';
            } else {
                // Remote is on right side of body
                // Move remote to right edge of body
                let rightEdgePosition =
                    (videoBody.offsetWidth -
                        (videoRemote.offsetWidth + offset));
                rightEdgePosition += 'px';

                let leftEdgePosition =
                    (offset);

                leftEdgePosition += ' px';

            }
        }

        if ((videoRemoteTop - videoBodyTop) < (videoBodyBottom - videoRemoteBottom)) {
            // Remote is on top side of body
            // Move remote to top edge of body
            videoRemote.style.top = offset + 'px';
        } else {
            // Remote is on bottom side of body
            // Move remote to bottom edge of body
            let bottomEdgePosition =
                (videoBody.offsetHeight -
                    (videoRemote.offsetHeight + offset));
            bottomEdgePosition += 'px';
            videoRemote.style.top = bottomEdgePosition;
        }


        document.removeEventListener('mouseup', closeDragElement);
        document.removeEventListener('touchend', closeDragElement);
        document.removeEventListener('mousemove', elementDrag);
        document.removeEventListener('touchmove', elementDrag);

        // Reset animation time to 0s
        videoRemote.style.transition = "transform 0s";
    }

    // Calculate closest position to edge of div.video-body
    const videoBodyRect = videoBody.getBoundingClientRect();
    const minOffsetX = videoBodyRect.left + window.pageXOffset;
    const maxOffsetX =
        videoBodyRect.right - videoRemote.offsetWidth + window.pageXOffset;
    const minOffsetY = videoBodyRect.top + window.pageYOffset;
    const maxOffsetY =
        videoBodyRect.bottom - videoRemote.offsetHeight + window.pageYOffset;

    // Move div.video-remote to closest position to edge of div.video-body
    let newOffsetX = parseInt(videoRemote.style.left);
    let newOffsetY = parseInt(videoRemote.style.top);
    if (newOffsetX < minOffsetX) {
        newOffsetX = minOffsetX;
    }
    if (newOffsetX > maxOffsetX) {
        newOffsetX = maxOffsetX;
    }
    if (newOffsetY < minOffsetY) {
        newOffsetY = minOffsetY;
    }
    if (newOffsetY > maxOffsetY) {
        newOffsetY = maxOffsetY;
    }
    videoRemote.style.left = newOffsetX + "px";
    videoRemote.style.top = newOffsetY + "px";
</script>

@endsection