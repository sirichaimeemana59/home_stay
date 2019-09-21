#!/bin/bash

# this is run by netlify. there is no need to run this manually.

# log
# Generate index.html and /temp assets for GH Pages branch
npm i
grunt build
grunt build-gh-pages

mkdir css
mkdir js_

cp node_modules/bootstrap/dist/css/bootstrap.min.css css/bootstrap.min.css
mv temp/bootstrap-slider.css css/bootstrap-slider.css
mv temp/bootstrap-slider.js_ js_/bootstrap-slider.js_
