CREATE TABLE "bearsbaseball"."announcements" 
( "AnnouncementNumber" INT NOT NULL 
, "Email" TEXT NULL DEFAULT NULL 
, "SessionID" VARCHAR(9) NULL DEFAULT NULL 
, "EventNumber" INT NULL DEFAULT NULL 
, "Date" DATE NULL 
, "Body" TEXT NOT NULL , PRIMARY KEY ("AnnouncementNumber")) 
ENGINE = InnoDB COMMENT = "Announcements Table"; 