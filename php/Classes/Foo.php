<?php
 /**
  *  Author of something.
  *
  * This Author class will hold the data that it has typed into it.
  *
  * @author Ryan Buchholz <rbuchholz1>
  */

 class Author {
	use ValidateUuid;
	/**
	 * This is the author's Id.
	 * @var UUid $authorId
	 */
	private $authorId;
	/**
	 * This is the author's activation token for their account.
	 * @var$authorActivationToken
	 */
	private $authorActivationToken;
	/**
	 * This is the author's Avatar URL for their image.
	 * @var $authorAvatarUrl
	 */
	private $authorAvatarUrl;
	/**
	 * This is the author's Email linked to their account.
	 * @var $authorEmail
	 */
	private $authorEmail;
	/**
	 * This is the author's password.
	 * @var $authorHash
	 */
	private $authorHash;
	/**
	 * This is the author's user name linked to their account.
	 * @var $authorUsername
	 */
	private $authorUsername;

	 /**
	  * accessor method for author id
	  *
	  * @return Uuid value of author id (or null if new author)
	  **/
	 /**
	  * @return UUid
	  */
	 public function getAuthorId(): UUid {
		 return $this->authorId;
	 }

	/**
	 * mutator method for author Id
	 *
	 * @param Uuid| string $newAuthorId value of new author Id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if the author Id is not
	 **/
	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store author id
		$this->authorId = $uuid;
	}

	/**
	 * accessor method for author activation token
	 *
	 * @return string value of activation token
	 **/
	 public function getAuthorActivationToken() {
		 return $this->authorActivationToken;
	 }
	 /**
	  * mutator method for author activation token
	  *
	  * @param string $newAuthorActivationToken
	  * @throws \InvalidArgumentException if the token is not a string or insecure
	  * @throws \RangeException if the token is not exactly 32 characters
	  * @throws \TypeError if the activation token is not a string
	  **/
	 public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		 if($newAuthorActivationToken ===  null) {
		 	$this->authorActivationToken = null;
		 	return;
		 }
		 $newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		 if(ctype_xdigit($newAuthorActivationToken) === false) {
		 	throw(new\RangeException("activation token not valid"));
		 }
		 //checking if author token is only 32 characters
		 if (strlen($newAuthorActivationToken) !== 32) {
		 	throw(new\RangeException("author token has to 32"));
		 }
		 $this->authorActivationToken = $newAuthorActivationToken;
	 }
	/**
	 * accessor method for the author avatar url
	 *
	 * @return string value of avatar url
	 **/
	 public function getAuthorAvatarUrl() {
		 return $this->authorAvatarUrl;
	 }
	 /**
	  * mutator method for the author avatar url
	  *
	  * @param string $newAuthorAvatarUrl new value of the avatar url
	  * @throws \InvalidArgumentException if $newAuthorAvatarUrl is not a string or insecure
	  * @throws \RangeException if $newAuthorAvatarUrl is not an image
	  * @throws \TypeError if $newAuthorAvatarUrl is not an image
	  **/
	 public function setAuthorAvatarUrl(string $newAuthorAvatarUrl): void {
	 	//verify the avatar url
		 $newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		 $newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING);
		 if(empty($newAuthorAvatarUrl) === true) {
		 	throw (new \InvalidArgumentException("Avatar Url empty or insecure"))
		 }
		 //verify that the Avatar will fit in the database
		 if(strlen($newAuthorAvatarUrl) > 100) {
		 	throw (new \RangeException("Avatar Url is too long"));
		 }
		 //store that Avatar Url
		 $this->authorAvatarUrl = $newAuthorAvatarUrl;
	 }

	 /**
	  * accessor method for email
	  *
	  * @return string value of email
	  */
	 public function getAuthorEmail() {
		 return $this->authorEmail;
	 }
	/**
	 * mutator method for email
	 *
	 * @param string $newAuthorEmail new value of email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or insecure
	 * @throws \RangeException if $newAuthorEmail is > 128 characters
	 * @throws \TypeError if $newAuthorEmail is not a string
	 **/
	 public function setAuthorEmail(string $newAuthorEmail): void {
	 	//verify that the email is secure
		 $newAuthorEmail = trim($newAuthorEmail);
		 $newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		 if(empty($newAuthorEmail) === true) {
		 	throw(new \InvalidArgumentException("author email is empty or insecure"));
		 }
		 //verify the email will fit in the database
		 if(strlen($newAuthorEmail) > 128) {
		 	throw(new\RangeException("author email is too large"));
		 }
		 //store the email
		 $this->authorEmail = $newAuthorEmail;
	 }
	 
 }