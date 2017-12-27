<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use PhpSpec\ObjectBehavior;

class RepoEndpointsSpec extends ObjectBehavior
{
    public function let(RepoHtmlUrl $htmlUrl, RepoApiUrl $url, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $this->beConstructedWith($htmlUrl, $url, $gitUrl, $sshUrl);
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoEndpoints::class);
    }


    public function it_exposes_html_url(RepoHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }


    public function it_exposes_url(RepoApiUrl $url)
    {
        $this->getUrl()->shouldReturn($url);
    }


    public function it_exposes_git_url(RepoGitUrl $gitUrl)
    {
        $this->getGitUrl()->shouldReturn($gitUrl);
    }


    public function it_exposes_ssh_url(RepoSshUrl $sshUrl)
    {
        $this->getSshUrl()->shouldReturn($sshUrl);
    }


    public function it_can_be_serialized(RepoHtmlUrl $htmlUrl, RepoApiUrl $url, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $url->serialize()->shouldBeCalled()->willReturn('url');
        $gitUrl->serialize()->shouldBeCalled()->willReturn('gitUrl');
        $sshUrl->serialize()->shouldBeCalled()->willReturn('sshUrl');
        $this->serialize()->shouldReturn(['htmlUrl' => 'htmlUrl', 'url' => 'url', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl']);
    }


    public function it_can_be_deserialized(RepoHtmlUrl $htmlUrl, RepoApiUrl $url, RepoGitUrl $gitUrl, RepoSshUrl $sshUrl)
    {
        $this->deserialize(['htmlUrl' => 'htmlUrl', 'url' => 'url', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl'])->shouldReturnAnInstanceOf(RepoEndpoints::class);
    }
}
