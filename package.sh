CWD=$(pwd)
COMMIT=$(git rev-parse HEAD)

mkdir -p ~/Desktop/BetterVisitorLog/
cp -R * ~/Desktop/BetterVisitorLog/

# Files that we want to exclude from the package
rm ~/Desktop/BetterVisitorLog/package.sh ~/Desktop/BetterVisitorLog/modman
mv ~/Desktop/BetterVisitorLog/README.md ~/Desktop/BetterVisitorLog/KJ-BETTER-VISITOR-LOG-README.md
echo "$COMMIT" >> ~/Desktop/BetterVisitorLog/app/code/community/KJ/BetterVisitorLog/etc/version.txt

cd ~/Desktop/BetterVisitorLog/
zip -r ../BetterVisitorLog.zip .

# Package up the magento connect package
tar -cvf ../KJ_BetterVisitorLog.tar *
cd ~/bin/magento-tar-to-connect
php magento-tar-to-connect.php bettervisitorlog-config.php

rm -rf ~/Desktop/BetterVisitorLog/ ~/Desktop/KJ_BetterVisitorLog.tar

cd $CWD
mv ~/Desktop/BetterVisitorLog.zip .
mv ~/Desktop/build-connect/KJ_BetterVisitorLog*.tgz ./KJ_BetterVisitorLog.tgz

scp BetterVisitorLog.zip serverpilot@magemail.co:~/apps/magemail/public/app/media/uploads/
scp KJ_BetterVisitorLog.tgz serverpilot@magemail.co:~/apps/magemail/public/app/media/uploads

rm BetterVisitorLog.zip KJ_BetterVisitorLog.tgz
rm -rf ~/Desktop/build-connect

echo "Deployed to https://magemail.co/BetterVisitorLog.zip"
echo "Deployed to https://magemail.co/KJ_BetterVisitorLog.tgz"
