#baseimageはMysqlオフィシャルimageを利用する
#tag 5.6はRed Hat Enterprise Linux Server release 7.2に基づいている
FROM mysql/mysql-server:5.7
MAINTAINER Chen Han <chen@kdl.co.jp>
#環境変数設定
#ランダムにrootパスワード生成
ENV MYSQL_RANDOM_ROOT_PASSWORD=yes
#rootパスワードは一回切りで無効になる(設定完了後無効になる)
ENV MYSQL_ONETIME_PASSWORD=yes
#以下、非rootユーザー設定になる
ENV MYSQL_DATABASE=docker_db
ENV MYSQL_USER=docker
ENV MYSQL_PASSWORD=docker
