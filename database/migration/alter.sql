ALTER TABLE `usuarios`
	ADD COLUMN `verificado` BIT NOT NULL DEFAULT b'0' AFTER `create_time`;