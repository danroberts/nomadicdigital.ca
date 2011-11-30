# Copyright 2011 Ivan Storck
# Rakefile to manage automated local / remote sync of PHP projects like WordPress and Joomla
# Assumptions: 
#   Git is the version control system
#   Only tested with ssh shortcuts in .ssh/config and public keys but should work with username and password too
#   for WordPress , .gitignore ignores wp-config.php
#   for Joomla, .gitignore ignores configuration.php 

require 'rake'
require 'net/ssh'
require 'net/scp'

@remote_host           = 'nomadicdigital.ca'                  # can be FQDN or set in .ssh/config
@ssh_username          = 'darobe'                  # required, even if set in .ssh/config
@ssh_password          = 'de1286'                        # using public key set in remote host's .ssh/authorized_keys
@remote_path           = "/home/darobe/www.nomadicdigital.ca"   # NO trailing slash
@local_db_dir_path     = 'db-backups'              # NO slashes
@remote_db_dir_path    = @local_db_dir_path

@mysql_local_user      = 'root'
@mysql_local_password  = ''
@mysql_local_db_name   = 'local_wordpress'

@mysql_remote_user     = 'darobe'
@mysql_remote_password = 'de1286'
@mysql_remote_db_name  = 'portfolio_site_wp'
@mysql_remote_host     = 'mysql.nomadicdigital.ca'              # this might be different on your production environment

@git_repo = 'git@github.com:danroberts/nomadicdigital.ca.git'
@local_hostnames = ['localhost','sitka.local', 'dyn-164-098.wireless.concordia.ca']   # put your development machines names here (run hostname from the commmand line)

def local?
  hostname = `hostname`.strip 
  @local_hostnames.include?(hostname)
end

desc "Deploy files to remote"
task :deploy do
  # assumes you've checked in files and pushed already
  # ssh to remote and git pull
  # 
end

desc "Deploy files and local db to remote"
task :deploydb do
  # dump local db
  # add local db to git
  # commit
  # push
  # ssh to remote
  # pull
  # import db on remote
end

namespace :db do

  desc "Am I on Localhost?"  # this is mostly for testing but might be useful
  task :is_local do
    puts local?
  end

  desc "Dump the current production database to a MySQL file"
  task :dump_remote, :filename do |t, args|
    if args[:filename] != nil
      @filename = args[:filename]
    else
      @filename = "db-backups/production_data-#{Time.now.strftime("%Y-%m-%d-%H%M")}.sql"
    end
    puts @filename
    if local?
      puts "ssh'ing and rake'ing"
      Net::SSH.start(@remote_host,@ssh_username, :password => @ssh_password) do |ssh|
        output = ssh.exec!("cd #{@remote_path} && rake db:dump_remote[\"#{@filename}\"]")
        puts output
      end
      puts "scp'ing db dump to local"
      puts @remote_host + ":" + @ssh_username + ":" + @remote_path + "/" + @filename + ".gz"
      Net::SCP.download!( @remote_host,
      					  @ssh_user,
      					  @remote_path + "/" + @filename + ".gz",
      					  @filename + ".gz",
      					  :password => @ssh_password)
      `gunzip #{@filename}`
       # import it into mysql (see task below)
    else
      puts "creating #{@filename}"
      puts "mysqldump --opt --compress -u#{@mysql_remote_user} -p#{@mysql_remote_password} -h#{@mysql_remote_host} #{@mysql_remote_db_name}"
      File.open(@filename,"w+") do |f|
        f << `mysqldump --opt --compress -u#{@mysql_remote_user} -p#{@mysql_remote_password} -h#{@mysql_remote_host} #{@mysql_remote_db_name}`
      end
      puts "gzipping #{@filename}.gz"
      `gzip #{@filename}`
    end
  end #task dump_production

  desc "Dump the local db to a MySQL file"
  task :dump_local do
    filename = "db-backups/development_data-#{Time.now.strftime("%Y-%m-%d-%H%M")}.sql"
    puts "creating #{filename}"
    File.open(filename,"w+") do |f|
      f << `mysqldump --opt --compress -u#{@mysql_local_user} #{@mysql_local_db_name}`
    end
    puts "gzipping #{filename}.gz"
    `gzip #{filename}`
  end  #task dump local dev

  desc "Import the latest production to dev local"
  task :import_latest => [:dump_remote] do
    # figure out latest .sql file
    Dir.chdir(@local_db_dir_path)
    latest =  Dir.glob("*.sql").reduce do |memo,file| 
      File.mtime(memo) > File.mtime(file) ? memo : file
    end  
    # import it into MySQL
    puts "importing " + latest + " ..."
    `mysql -u#{@mysql_local_user} #{@mysql_local_db_name} < #{latest}`
    puts "done."
  end
end #namespace db
