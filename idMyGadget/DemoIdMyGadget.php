<?php
require_once 'deviceData.php';
require_once 'IdMyGadget.php';

/**
 * Class defining methods to demonstrate features of Wurfl and the IdMyGadget class
 */
class DemoIdMyGadget
{
	/**
	 * This class has-a IdMyGadget object
	 * @var IdMyGadget
	 */
	protected $idMyGadgetObject = null;

	/**
	 * Constructor
	 */
	public function __construct( $idMyGadgetObject=null )
	{
		if ( $idMyGadgetObject == null )
		{
			$this->idMyGadgetObject = new IdMyGadget();    // Instantiate the TeraWURFL object
		}
		else
		{
			$this->idMyGadgetObject = $idMyGadgetObject;
		}
	}

	/**
	 * Display all of the device capabilities by expanding the arrays
	 * @return string of <li> tags listing all of the capabilities wurfl currently ascertains
	 */
	public function displayCapabilityArrays()
	{
		$output = "<div>";
		//
		// Get all of the capabilities, and display each
		// If one of the capabilities is an array, display each of the elements in the array
		//
		if ( $this->idMyGadgetObject->teraWurflObject->getDeviceCapabilitiesFromRequest($_SERVER) )
		{
			foreach ( $this->idMyGadgetObject->teraWurflObject->capabilities as $topLevelKey => $topLevelValue )
			{
				if ( is_array($topLevelValue) )
				{
				//	$output .= "<p>$topLevelKey is an array:</p>";
					$output .= "<ul class='no-bullets'>";
					$arrayName = $topLevelKey;
					foreach ( $topLevelValue as $key => $value )
					{
						$output .= "<li>" . $arrayName . "['" . $key . "']: '" . $value . "'</li>";
					}
					$output .= "</ul>";
				}
				else
				{
					$output .= "<p>$topLevelKey = $topLevelValue</p>";
				}
			}
		}
		$output .= "</div>";
		return $output;
	}
	/**
	 * Display all of the capabilities in a flat, sorted list
	 * @return string of <li> tags containing a sorted list of all of the capabilities
	 */
	public function displaySortedCapabilities()
	{
		$output = "";
		//
		// Get all of the capability names, sort them, and display each and its value
		//
		if ( $this->idMyGadgetObject->teraWurflObject->getDeviceCapabilitiesFromRequest($_SERVER) )
		{
			$capabilityNames = $this->idMyGadgetObject->teraWurflObject->getLoadedCapabilityNames();
			$sortedCapabilityNames = sort( $capabilityNames );
			for ( $index = 0; $index < count($capabilityNames); $index++ )
			{
				$value = $capabilityNames[$index];
				$output .= "<li>" . $value . ": '" . $this->idMyGadgetObject->teraWurflObject->getDeviceCapability($value) . "'</li>";
			}
			$output .= "</ul><ul><li>Found " . count($capabilityNames) . " capabilities</li>";
		}
		return $output;
	}
	/**
	 * Display all of the capabilities
	 * @return string of <li> tags listing all of the capabilities (unsorted)
	 */
	public function displayAllCapabilities()
	{
		$output = "";
		//
		// Get all of the capability names, and display each
		//
		if ( $this->idMyGadgetObject->teraWurflObject->getDeviceCapabilitiesFromRequest($_SERVER) )
		{
			$loadedCapabilityNames = $this->idMyGadgetObject->teraWurflObject->getLoadedCapabilityNames();

			foreach ( $loadedCapabilityNames as $key => $value )
			{
				$output .= "<li>" . $value . ": '" . $this->idMyGadgetObject->teraWurflObject->getDeviceCapability($value) . "'</li>";
			}
		}

		return $output;
	}
	/**
	 * Display the key capabilities
	 * @return string of <li> tags listing the key capabilities
	 */
	public function displayKeyCapabilities()
	{
		$keyCapabilities = $this->idMyGadgetObject->getKeyCapabilities();
		$output = "";

		foreach( $keyCapabilities as $key => $value )
		{
			$output .= "<li>" . $key . ":&nbsp;'" . $value . "'</li>";
		}

		return $output;
	}
	/**
	 * Display the device data
	 * @return string of <li> tags listing the device data
	 */
	public function displayDeviceData()
	{
		$deviceData = $this->idMyGadgetObject->getDeviceData();
		$output = "";

		foreach( $deviceData as $key => $value )
		{
			$output .= "<li>" . $key . ":&nbsp;'" . $value . "'</li>";
		}

		return $output;
	}
}
?>
