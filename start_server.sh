#!/bin/bash
cd "$(dirname "$0")"

echo "================================================="
echo " Starting Local PHP Development Server "
echo "================================================="
echo "Your project is running at:"
echo "👉 http://localhost:8000/GcoConnect"
echo "👉 http://localhost:8000/Icare"
echo " http://localhost:8000/networkmap
echo "================================================="
echo "(Press Ctrl+C to stop the server)"
echo ""

./php -S localhost:8000
