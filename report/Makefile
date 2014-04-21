ABSTRACT=`cat abstract.md`

all: report


report: 
	pandoc content.md -o report.pdf --latex-engine=xelatex --include-in-header=margins.sty \
	--toc --variable abstract="$(ABSTRACT)" --variable title="Password Manager - Web Programming - Module 7054 Project" \
	--variable author="Aravindo Wingeier" 
	
	@#--variable links-as-notes=true
