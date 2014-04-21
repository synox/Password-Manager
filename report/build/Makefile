
all: report


report: 
	pandoc report.md -o report.pdf --latex-engine=xelatex --include-in-header=margins.sty \
	--toc --variable abstract="I'm an abstract" --variable title="Password Manager - Web Programming - Module 7054 Project" \
	--variable author="Aravindo Wingeier" \
	--variable links-as-notes=true
