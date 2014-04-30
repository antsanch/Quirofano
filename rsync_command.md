https://www.digitalocean.com/community/articles/how-to-copy-files-with-rsync-over-ssh

Step 1 - Setup public SSH keys
On our origin server, we will generate public SSH keys with no password:

    ssh-keygen -f ~/.ssh/id_rsa -q -P ""
    cat ~/.ssh/id_rsa.pub


This is our public SSH key that can be placed on other hosts to give us access:

    ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDLVDBIpdpfePg/a6h8au1HTKPPrg8wuTrjdh0QFVPpTI4KHctf6/FGg1NOgM++hrDlbrDVStKn/b3Mu65//tuvY5SG9sR4vrINCSQF++a+YRTGU6Sn4ltKpyj3usHERvBndtFXoDxsYKRCtPfgm1BGTBpoSl2A7lrwnmVSg+u11FOa1xSZ393aaBFDSeX8GlJf1SojWYIAbE25Xe3z5L232vZ5acC2PJkvKctzvUttJCP91gbNe5FSwDolE44diYbNYqEtvq2Jt8x45YzgFSVKf6ffnPwnUDwhtvc2f317TKx9l2Eq4aWqXTOMiPFA5ZRM/CF0IJCqeXG6s+qVfRjB root@cloudads

Step 2 - Configurar el servidor destino
Copy this key to your clipboard and login to your destination server.

Place this SSH key into your ~/.ssh/authorized_keys file:

If your SSH folder does not exist, create it manually:

    mkdir ~/.ssh
    chmod 0700 ~/.ssh
    touch ~/.ssh/authorized_keys
    chmod 0644 ~/.ssh/authorized_keys

Paso 3 - Copiar http://www.tecmint.com/rsync-local-remote-file-synchronization-commands/

Basic syntax of rsync command

    # rsync options source destination

Some common options used with rsync commands

  -v : verbose
  -r : copies data recursively (but don’t preserve timestamps and permission while transferring data
  -a : archive mode, archive mode allows copying files recursively and it also preserves symbolic links, file permissions, user & group ownerships and timestamps
  -z : compress file data
  -h : human-readable, output numbers in a human-readable format

Paspo 4 - Con este comando se actualiza

rsync -avzh * antsanch@148.234.140.6:/home/antsanch/webapps/quirofano.git/
