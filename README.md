CollectionUploadSample
======================

Simple Symfony2 project using CollectionUpload from Avocode/FormExtensions

Comes with a vagrant box ready to use.

How to see it in action:

 - Clone the repository

 - run `vagrant up` command

 - Edit your `hosts` file and add the following host: `192.168.56.203 www.collectionupload.dev collectionupload.dev`

 - Go to http://www.collectionupload.dev
 
Available routes are:

 - Libraries list: http://www.collectionupload.dev/admin/acme_demo_bundle/Library/ (uses CollectionUpload in SYNC mode)
 
 - Products list: http://www.collectionupload.dev/admin/acme_demo_bundle/Product/ (uses CollectionUpload in ASYNC mode)
