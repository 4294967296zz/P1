
# DOZ 독서실 웹어플리케이션
+ 소개

  독서실 관리와 이용을 위해 개발한 웹 어플리케이션입니다.
  
  관리자와 이용자 두개의 사이드로 구성되어 있습니다.
  
  오직 회원제로 이용가능한 독서실 시스템이기에 모든로직에서 권한확인을 적용하였습니다.
  
  ![default](https://user-images.githubusercontent.com/37359972/37443279-76c4fc26-284e-11e8-9f1b-9931baab8556.png)
  
  회원은 이용자 PC로 로그인하여 이용자 페이지에서 좌석의 입퇴실과 대여품의 신청,반납 등의 기능을 사용할 수 있으며,

  관리자는 관리자 PC로 관리자 페이지에서의 독서실 이용의 전반적인 부분을 관리할 수 있습니다.
  


  +  웹 화면 구성 : HTML, CSS, PHP, Javascript

  +  개발 Tool : Xampp (Apache, MySQL), Netbeans
------------------------

  + 관리자 Side

    독서실 이용을 위한 회원의 이용권 등록/조회
    
    회원 정보 검색/조회/수정/삭제
    
    좌석 및 대여품의 이용현황 검색/조회/관리
    
    이용 기록 검색/조회

    시설물 추가/수정/삭제등 의 관리
    

  + 이용자 Side

    회원가입과 로그인/아웃 등 이용을 위한 기본적인 폼
    
    회원본인의 정보 확인/수정/탈퇴
    
    게시판 글, 댓글 검색/작성/조회/수정/삭제
    
    좌석 및 대여품의 정보확인과 이용신청/반납
    
     --------------------------------
     
## 관리자 로그인시 관리자페이지로 리다이렉트

![_](https://user-images.githubusercontent.com/37359972/37442622-c05d4b4e-284a-11e8-8b0c-7068bca926dd.gif)

## 이용자의 게시판 및 댓글활용

![default](https://user-images.githubusercontent.com/37359972/37442660-f2994b8a-284a-11e8-95b2-c82fdfcdda55.gif)

## 좌석 시스템

    + 이용자
    
    
![default](https://user-images.githubusercontent.com/37359972/37442861-df5c6d1c-284b-11e8-9944-94367aa991a9.gif)

    + 관리자
    
    
![_](https://user-images.githubusercontent.com/37359972/37442868-f1460614-284b-11e8-869d-3c38878575b5.gif)

## 데이터베이스 구조
  8개의 테이블로 구성되어 있습니다.

![db](https://user-images.githubusercontent.com/37359972/37438699-659cdcbe-2837-11e8-8b3b-9760c12b87e3.png)

## 관리자측의 페이지 구조
   초기 메인화면은 이용자 페이지입니다.
   
   관리자가 로그인 시 권한확인 후 관리자페이지로 리다이렉트됩니다.
![client](https://user-images.githubusercontent.com/37359972/37387421-a11ebc96-279f-11e8-8461-43743256ca27.png "클라이언트구성도")

## 이용자측의 페이지 구조
![_](https://user-images.githubusercontent.com/37359972/37387307-3eabf38a-279f-11e8-9d9b-3b5827851ef1.png "클라이언트구성도")

