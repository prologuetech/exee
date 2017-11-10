<?php
namespace Prologuetech\Exee;

use React\EventLoop\Factory;
use React\Socket\Connector;
use React\Socket\ConnectionInterface;

class Client {

	public function open() {
		$target = 'localhost:2000';
		$loop = Factory::create();
		$connector = new Connector($loop);
		$connector->connect($target)->then(function (ConnectionInterface $connection) use ($target) {
			$connection->on('data', function ($data) {
				echo $data;
			});
			$connection->on('close', function () {
				echo '[CLOSED]' . PHP_EOL;
			});
			$connection->write('0,"019"1,"Service Availability"23,"1"50,"US"117,"US"99,""');
		}, 'printf');
		$loop->run();
	}
}
