#!/bin/bash

files=( \
  jquery-jvectormap.js_ \
  jquery-mousewheel.js_ \
  lib/jvectormap.js_ \
  lib/abstract-element.js_ \
  lib/abstract-canvas-element.js_ \
  lib/abstract-shape-element.js_ \
  lib/svg-element.js_ \
  lib/svg-group-element.js_ \
  lib/svg-canvas-element.js_ \
  lib/svg-shape-element.js_ \
  lib/svg-path-element.js_ \
  lib/svg-circle-element.js_ \
  lib/vml-element.js_ \
  lib/vml-group-element.js_ \
  lib/vml-canvas-element.js_ \
  lib/vml-shape-element.js_ \
  lib/vml-path-element.js_ \
  lib/vml-circle-element.js_ \
  lib/vector-canvas.js_ \
  lib/simple-scale.js_ \
  lib/ordinal-scale.js_ \
  lib/numeric-scale.js_ \
  lib/color-scale.js_ \
  lib/data-series.js_ \
  lib/proj.js_ \
  lib/world-map.js_ \
)

baseDir=`dirname $0`

counter=0
while [ $counter -lt ${#files[@]} ]; do
  files[$counter]="$baseDir/${files[$counter]}"
  let counter=counter+1
done

if [ -z "$1" ]
  then
    minified=jquery.jvectormap.min.js_
  else
    minified=$1
fi

if [ -a $minified ]
  then
    rm $minified
fi

cat ${files[*]} >> $minified

uglifyjs --overwrite $minified
