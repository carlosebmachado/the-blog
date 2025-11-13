# Setup
Create a systemd service file
```bash
sudo nano /etc/systemd/system/the-blog.service
```

Add this content:
```
[Unit]
Description=The Blog
After=network.target

[Service]
Type=simple
User=root
ExecStart=/full/path/to/deploy.sh
WorkingDirectory=/var/www/the-blog
Restart=on-failure
RestartSec=10

[Install]
WantedBy=multi-user.target
```

Enable and start the service:
```bash
sudo systemctl daemon-reload
sudo systemctl enable the-blog.service
sudo systemctl start the-blog.service
```
