ENDPOINT 192.168.211.212:8000

- GET api/articles (모든 재능기부 목록)
- POST api/articles (재능기부자가 재능기부 등록)
    - 'user_id', 'title', 'content', 'image_url', 'address'
- GET api/articles/:article_id (재능기부 상세)
- POST api/articles/:article_id (이용자가 재능기부 신청)
    - 'user_id', 'article_id'
- GET api/articles/:user_id (이용자의 재능기부 신청 목록)
- GET api/talents (공공데이터 위치정보)
    - querystring (시도, 시도군 정보가 있으면 보내고 없을 시 쿼리스트링 포함 X)
        - ex) api/talents?dstrCdL=울산&dstrNmM=동구
        - dstrCdL - 시도
            - ex) 울산
        - dstrNmM - 시도군
            - ex) 동구
