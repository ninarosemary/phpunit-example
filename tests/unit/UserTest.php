<?php

use PHPUnit\Framework\TestCase;
use \App\Models\User;

class UserTest extends TestCase
{

    protected $user;

    protected function setUp(): void
    {
        $this->user = new User;
    }


    /** @test */
    public
    function get_and_set_first_name()
    {

        $this->user->setFirstName('Nina');

        $this->assertEquals($this->user->getFirstName(), 'Nina');
    }

    /** @test */
    public
    function get_and_set_last_name()
    {
        $this->user->setLastName('Barkat');

        $this->assertEquals($this->user->getLastName(), 'Barkat');
    }

    /** @test */
    public
    function full_name_is_returned()
    {
        $this->user->setFirstName('Nina');
        $this->user->setLastName('Barkat');

        $this->assertEquals($this->user->getFullName(), 'Nina Barkat');
    }

    /** @test */
    public
    function first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName('Nina      ');
        $this->user->setLastName('       Barkat');

        $this->assertEquals($this->user->getFirstName(), 'Nina');
        $this->assertEquals($this->user->getLastName(), 'Barkat');

    }

    /** @test */
    public
    function set_and_get_email()
    {
        $email = 'nina.barkat@experius.nl';

        $this->user->setEmail($email);

        $this->assertEquals($this->user->getEmail(), $email);
    }

    /** @test */
    public
    function email_variables_contain_correct_values()
    {
        $this->user->setFirstName('Nina');
        $this->user->setLastName('Barkat');
        $this->user->setEmail('nina.barkat@experius.nl');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Nina Barkat');
        $this->assertEquals($emailVariables['email'], 'nina.barkat@experius.nl');
    }

}