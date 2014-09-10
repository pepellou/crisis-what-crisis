#!/bin/bash
script_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
log_file=/var/log/crisis.log
min=25
max=70

ratio=$($script_dir/text_html.bash http://crisis-whatcrisis.com)

if [[ $ratio -lt $min ]]
then
    echo WARNING: ratio of $ratio is under $min%! >> $log_file
fi

if [[ $ratio -gt $max ]]
then
    echo WARNING: ratio of $ratio is over $max%! >> $log_file
fi
