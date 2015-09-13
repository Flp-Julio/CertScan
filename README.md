# CertScan [EM CONSTRUÇÃO!]
CertScan é um script simples em PHP que trabalha a saída do SSLScan melhorando a forma de evidenciação e facilitando a identificação das principais vulnerabilidades relacionadas a cifras e certificados. 

#Vulnerabilidades detectáveis:
1 - TLS renegotiation<br>
2 - Heartbleed<br>
3 - Versão obsoleta de protocolos de segurança (SSL)<br>
4 - Suporte ao uso de cifras RC4<br>
6 - Possibilidade de ataque BEAST SSL/TLS<br>
6 - Possibilidade de ataque FREAK SSL<br>
7 - Suporte ao uso de cifras anônimas [EM CONSTRUÇÃO!]<br>
8 - Assinatura do certificado<br>

#Formas de uso:
php certscan.php www.alvo.com (Verificará todas as possibilidades citadas)<br>
php certscan.php www.alvo.com -1,4 (Verificará as possibilidades 1 [TLS renegotiation] e 4 [Cifras RC4])<br>

#Dependências 
Obs: Por se tratar de um script em php, faz-se necessário para  seu funcionamento que o PHP esteja instalado, bem como o SSLScan, que é o alicerce do script. <br>
https://www.php.net/<br>
https://www.titania.com  -  http://sourceforge.net/projects/sslscan
