#!/bin/bash
cd "$(dirname "$0")"

echo "================================================="
echo " Starting Local PHP Development Server "
echo "================================================="
echo "Your project is running at:"
echo "👉 http://localhost:8000/GcoConnect"
echo "👉 http://localhost:8000/Icare"
echo "👉 http://localhost:8000/networkmap"
echo "👉 http://localhost:8000/Discourse"
echo "👉 http://localhost:8000/card-flip-puzzle"
echo "================================================="
echo "(Press Ctrl+C to stop the server)"
echo ""

# Detect PHP binary and start the server
if [ -f "./frankenphp" ]; then
    ./frankenphp php-server --listen localhost:8000
elif command -v php >/dev/null 2>&1; then
    php -S localhost:8000
elif [ -f "/Applications/XAMPP/xamppfiles/bin/php" ]; then
    /Applications/XAMPP/xamppfiles/bin/php -S localhost:8000
else
    echo "❌ PHP was not found on your Mac. Please install PHP or XAMPP."
fi
