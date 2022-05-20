<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posts::create([
            'title' => 'XSS using response manipulation.',
            'description' => "Cross-site Scripting(XSS) using response manipulation. ",
            'body' => "Hey people!
                        \nI am an Individual Security researcher from India.
                        \nKnow more about Cross-site scripting.
                        \nSo I was searching for a responsible disclosure program and after some Google Dorking, I got one. Because the program doesn’t allow public exposure let us consider the domain as vulndomain.com
                        \nI did some subdomain-finding and got my first URL for testing. It was a helpdesk kinda page where there was a search option.
                        \nAfter some directory enumeration and functionality checks, I noticed user input getting reflected on the index page of the subdomain.
                        \nAfter capturing and Intercepting the requests I understood that the validations were only getting done on the inputs and the requests by the user.",
            'visits' => 1,
            'pinned' => true,
            'user_id' => 1
        ]);
        Posts::create([
            'title' => 'Efficient Implementation of AWS Service Control Policies With Terraform',
            'description' => "Service Control Policies — Service Control Policies AWS Service Control Policies (SCPs) help us to establish preventative guardrails.",
            'body' => "AWS Service Control Policies (SCPs) help us to establish preventative guardrails. They make sure that particular system changes cannot happen, no matter if intentionally or by accident. For example, an SCP can make sure that unauthorised individuals are not allowed to delete existing log files. By putting those guardrails in place we reduce the risk for our organisation and also protect individuals from human errors.
                        Larger cloud deployments typically include a multi-account setup. AWS Organizations is an out-of-the-box solution to structure and manage multiple accounts. AWS Organizations has a feature called Organizational Units (OUs). OUs allow us to easily group AWS accounts by business domains, geo-locations, or the environment purpose, such as Development, Testing or Production.
                        There will be cases where we are prepared to accept more risk for one environment - e.g. manual deployments of instances are allowed in Development, but Production requires standardised CI/CD pipelines. There will also be cases where we want the same rules in place for several OUs. However, we don’t want to write the same statements over and over again and maintain them in multiple places.",
            'visits' => 3,
            'pinned' => false,
            'user_id' => 2
        ]);
        Posts::create([
            'title' => 'Sensitive Data Exposure via 403 Forbidden Bypass',
            'description' => "",
            'body' => "Hello everyone! My name is Sagar Sajeev. I’m a high school student from India. This is my first writeup and I would like to share how I was able to access a sensitive file via a 403 forbidden page bypass.
                        How I found it?
                        The story happens when I was using Google dorks to find some domains to check for bugs. It was then this particular domain of a well reputed company caught my eye (Lets call it redacted.com as I'm not supposed to reveal its name)
                        I straight away went on to the process of finding more subdomains. I saw a interesting subdomain which I thought would be cool to hunt.
                        After reporting a low hanging bug (which turned out to be duplicate), I thought why not look for something which can potentially cause any sort of sensitive data exposures.
                        I used Dirbuster and Dirsearch to bruteforce any directories or files which may contain sensitive information.",
            'visits' => 10,
            'pinned' => true,
            'user_id' => 2
        ]);
        Posts::create([
            'title' => 'Post 4',
            'description' => "this is a description for post 4",
            'body' => "this is post 4",
            'visits' => 5,
            'pinned' => false,
            'user_id' => 1
        ]);
        Posts::create([
            'title' => 'Post 5',
            'description' => "this is a description for post 5",
            'body' => "this is post 5",
            'visits' => 2,
            'pinned' => false,
            'user_id' => 2

        ]);
    }
}
