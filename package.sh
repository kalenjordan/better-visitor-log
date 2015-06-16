CWD=$(pwd)
COMMIT=$(git rev-parse HEAD)

mkdir -p ~/Desktop/BetterVisitorLog/
cp -R * ~/Desktop/BetterVisitorLog/

# Files that we want to exclude from the package
rm ~/Desktop/BetterVisitorLog/package.sh ~/Desktop/BetterVisitorLog/modman
echo "$COMMIT" >> ~/Desktop/BetterVisitorLog/app/code/community/KJ/BetterVisitorLog/etc/version.txt

cd ~/Desktop/BetterVisitorLog/
zip -r ../BetterVisitorLog.zip .

rm -rf ~/Desktop/BetterVisitorLog/

cd $CWD
mv ~/Desktop/BetterVisitorLog.zip .

scp BetterVisitorLog.zip serverpilot@magemail.co:~/apps/magemail/public/
rm BetterVisitorLog.zip

echo "Deployed to https://magemail.co/BetterVisitorLog.zip"
