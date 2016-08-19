#!/bin/bash

for f in *.md; do pandoc $f > $(echo $f | cut -d '.' -f 1).html; done
