<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resources extends CI_Controller
{

	public function index()
	{
	
		$data['resources'] = [
			[
				'title' => 'Learning Resource Lorem ipsum dolor sit amet.',
				'image' => 'https://techintel.tech/lp/images/crowdstrike-2.png',
				'link'  => '#'
			],
			[
				'title' => 'Innovation Ideas Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt, animi.',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Tools & Resources Lorem ipsum dolor sit amet, consectetur adipisicing.',
				'image' => 'https://techintel.tech/lp/images/29_10.png',
				'link'  => '#'
			],
			[
				'title' => 'Security Insights for Modern Enterprises',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Cloud Transformation Whitepaper',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Future of Artificial Intelligence in Business',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Data Analytics Essentials for 2025',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Customer Experience Enhancement Strategies',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],
			[
				'title' => 'Cybersecurity Threat Report 2025',
				'image' => 'https://techintelpro.com/Top-Five-Considerations-for-Informatica-Customers/Images/cover.PNG',
				'link'  => '#'
			],

		];

		
		$this->load->view('resources', $data);
	}
}
